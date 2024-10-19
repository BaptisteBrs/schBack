<?php

namespace App\Repositories;

use App\Models\Pef;
use App\Models\PefPictures;
use DateTime;
use Storage;

/**
 * Class PefRepository.
 */
class PefRepository
{

    public function all()
    {
        return Pef::with('pictures')->orderBy('id', 'desc')->get();
    }

    public function save(Pef $pef, array $array, $is_create = false): Pef
    {
        if ($is_create) {
            $pef->publication = new DateTime();
        }
        $pef->title = $array['title'];
        $pef->date = $array['date'];
        $pef->begin = array_key_exists('begin', $array) ? $array['begin'] : null;
        $pef->end = array_key_exists('end', $array) ? $array['end'] : null;
        $pef->description = array_key_exists('description', $array) ? $array['description'] : null;
        //$Pef->picture = array_key_exists('picture', $array) ? $array['picture'] : null;

        $pef->save();
        if (count($array['picture']) > 0) {
            $Pef_pictures = PefPictures::where('pef_id', $pef->id)->get();
            foreach ($Pef_pictures as $file) {
                Storage::disk('public')->delete(str_replace('storage/', '', $file->name));
            }
            PefPictures::where('pef_id', $pef->id)->delete();
        }
        foreach ($array['picture'] as $pictureName) {
            $picture =  new PefPictures();
            $picture->name = $pictureName;
            $picture->pef_id = $pef->id;
            $picture->save();
        }

        $pef = Pef::where('id', $pef->id)->with('pictures')->first();

        return $pef;
    }

    public function show(int $id)
    {
        return Pef::where('id', $id)->with('pictures')->first();
    }

    public function store(array $array)
    {
        $pef = new Pef();
        return $this->save($pef, $array, true);
    }

    public function update(array $array, int $id)
    {
        $pef = Pef::where('id', $id)->first();
        return $this->save($pef, $array);
    }

    public function delete($id)
    {
        $pef_pictures = PefPictures::where('pef_id', $id)->get();
        foreach ($pef_pictures as $file) {
            Storage::disk('public')->delete(str_replace('storage/', '', $file->name));
        }
        PefPictures::where('pef_id', $id)->delete();
        $pef = Pef::where('id', $id)->first();
        $pef->delete();
        return $pef;
    }

    public function last()
    {
        return Pef::with('pictures')->orderBy('id', 'desc')->take(5)->get();
    }
}
