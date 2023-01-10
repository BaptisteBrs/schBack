<?php

namespace App\Repositories;

use App\Models\Partenaire;


//use Your Model

/**
 * Class PartenaireRepository.
 */
class PartenaireRepository
{
    public function all()
    {
        return Partenaire::all();
    }

    public function save(Partenaire $partenaire, array $array): Partenaire
    {
        $partenaire->email = array_key_exists('email', $array) ? $array['email'] : null;
        $partenaire->phone = array_key_exists('phone', $array) ?  $array['phone'] : null;
        $partenaire->address = array_key_exists('address', $array) ?  $array['address'] : null;
        $partenaire->zip = array_key_exists('zip', $array) ?  $array['zip'] : null;
        $partenaire->city = array_key_exists('city', $array) ?  $array['city'] : null;
        $partenaire->name = $array['name'];
        $partenaire->website = array_key_exists('website', $array) ?  $array['website'] : null;
        $partenaire->picture = array_key_exists('picture', $array) ?  $array['picture'] : null;

        // if (!array_key_exists('picture', $array)) {
        //     if ($partenaire->picture === null) {
        //         $partenaire->picture = null;
        //     }
        // } else {
        //     $partenaire->picture = $array['picture'];
        // }

        $partenaire->save();

        return $partenaire;
    }

    public function show(int $id)
    {
        return Partenaire::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $partenaire = new Partenaire();
        return $this->save($partenaire, $array);
    }

    public function update(array $array, int $id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        return $this->save($partenaire, $array);
    }

    public function delete($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        $partenaire->delete();
        return $partenaire;
    }
}
