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
        $partenaire->email = $array['email'];
        $partenaire->phone = $array['phone'];
        $partenaire->address = $array['address'];
        $partenaire->zip = $array['zip'];
        $partenaire->city = $array['city'];
        $partenaire->name = $array['name'];
        $partenaire->website = $array['website'];
        $partenaire->picture = $array['picture_name'];

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
