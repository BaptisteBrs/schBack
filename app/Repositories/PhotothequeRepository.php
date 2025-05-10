<?php

namespace App\Repositories;

use App\Models\Phototheque;
use App\Models\PhotothequeImages;
use Illuminate\Http\Request;
use Storage;

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
            'type_evenement' => $request->type_evenement,
            'date' => $request->date,
        ]);

        $images = $request->file('images');
        if ($images && count($images) > 0) {
            foreach ($images as $index => $imageFile) {
                $filename = uniqid() . '.jpg';
                $path = 'phototheques/' . $phototheque->id . '/' . $filename;

                $img = PhotothequeImages::make($imageFile)->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('jpg', 75);

                Storage::disk('public')->put($path, $img);
                $phototheque->images()->create(['image_path' => $path]);

                if ($index === 0) {
                    $phototheque->update(['image_couverture' => $path]);
                }
            }
        }

        return $phototheque->load('images');
    }
}
