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

        $images = $request->file('images');
        if ($images && count($images) > 0) {
            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

            foreach ($images as $index => $imageFile) {
                $filename = uniqid() . '.jpg';
                $path = 'images/phototheques/' . $phototheque->id . '/' . $filename;

                $image = $manager->read($imageFile->getPathname());

                // $image->resize(1200, null, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // });

                $imageBinary = $image->toJpeg(75); // compression à 75%

                // Enregistrement
                Storage::disk('public')->put($path, $imageBinary);

                $phototheque->images()->create(['image_path' => $path]);

                if ($index === 0) {
                    $phototheque->update(['image_couverture' => $path]);
                }
            }
        }

        return $phototheque->load('images');
    }
}
