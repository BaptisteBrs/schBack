<?php

namespace App\Repositories;

use App\Models\Phototheque;
use Illuminate\Http\Request;
use Storage;
use Intervention\Image\ImageManager;


/**
 * Class PermissionRepository.
 */
class PhotothequeRepository
{

    public function getAll()
    {
        return Phototheque::with('images')->latest()->get();
    }

    public function getById($id)
    {
        return Phototheque::with('images')->findOrFail($id);
    }

    public function create(Request $request)
    {
        $phototheque = Phototheque::create([
            'titre' => $request->titre,
            'sous_titre' => $request->sous_titre,
            'date' => $request->date,
        ]);
        $imageCouvertureIndex = intval($request->input('image_couverture_index', 0)); // défaut à 0

        $images = $request->file('images');
        if ($images && count($images) > 0) {
            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

            foreach ($images as $index => $imageFile) {
                $filename = uniqid() . '.jpg';
                $path = 'images/phototheques/' . $phototheque->id . '/' . $filename;

                $image = $manager->read($imageFile->getPathname());

                $imageBinary = $image->toJpeg(75); // compression à 75%

                // Enregistrement
                Storage::disk('public')->put($path, $imageBinary);

                $phototheque->images()->create(['image_path' => $path]);

                if ($index === $imageCouvertureIndex) {
                    $phototheque->update(['image_couverture' => $path]);
                }
            }
        }

        return $phototheque->load('images');
    }

    public function update(Request $request, $id)
    {
        $phototheque = Phototheque::with('images')->findOrFail($id);

        // Validation
        $request->validate([
            'titre' => 'required|string',
            'sous_titre' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Mise à jour des champs de base
        $phototheque->update([
            'titre' => $request->titre,
            'sous_titre' => $request->sous_titre,
            'date' => $request->date,
        ]);

        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

        $imageCouvertureIndex = intval($request->input('image_couverture_index', -1));

        // Ajout des nouvelles images
        if ($request->hasFile('images')) {
            $newImages = $request->file('images');

            foreach ($newImages as $index => $imageFile) {
                $filename = uniqid() . '.jpg';
                $path = 'phototheques/' . $phototheque->id . '/' . $filename;

                $img = $manager->read($imageFile->getPathname())
                    ->resize(1200, null, fn($c) => $c->aspectRatio()->upsize())
                    ->toJpeg(75);

                Storage::disk('public')->put($path, $img);

                $image = $phototheque->images()->create([
                    'image_path' => $path,
                ]);

                // Définir comme image de couverture si index correspond
                if ($index === $imageCouvertureIndex) {
                    $phototheque->update(['image_couverture' => $path]);
                }
            }
        }

        // Suppression des anciennes images non gardées
        if ($request->has('delete_images')) {
            $deleteIds = json_decode($request->input('delete_images'), true);

            foreach ($phototheque->images()->whereIn('id', $deleteIds)->get() as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }

                // Supprime l’image uniquement si ce n’est pas l’image de couverture
                if ($image->image_path !== $phototheque->image_couverture) {
                    $image->delete();
                }
            }

            // Si l’image de couverture a été supprimée, l’enlever aussi côté photothèque
            if ($phototheque->images()->where('image_path', $phototheque->image_couverture)->doesntExist()) {
                $phototheque->update(['image_couverture' => null]);
            }
        }

        return $phototheque->load('images');
    }


    public function destroy($id)
    {
        $phototheque = Phototheque::with('images')->findOrFail($id);

        // Supprimer les fichiers des images
        foreach ($phototheque->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        // Supprimer le dossier complet si besoin
        $directory = 'phototheques/' . $phototheque->id;
        if (Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->deleteDirectory($directory);
        }

        // Supprimer les enregistrements en base
        $phototheque->images()->delete(); // si relation hasMany
        $phototheque->delete();

        return response()->json(['message' => 'Photothèque supprimée.']);
    }
}
