<?php

namespace App\Repositories;

use App\Models\Boutique;


//use Your Model

/**
 * Class BoutiqueRepository.
 */
class BoutiqueRepository
{
    public function all()
    {
        return Boutique::all();
    }

    public function save(Boutique $boutique, array $array): Boutique
    {
        $boutique->name = $array['name'];
        $boutique->type = $array['type'];
        $boutique->picture = $array['picture_name'];
        $boutique->picture = $array['priceAD'];
        $boutique->picture = $array['priceJR'];
        $boutique->save();
        return $boutique;
    }

    public function show(int $id)
    {
        return Boutique::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $boutique = new Boutique();
        return $this->save($boutique, $array);
    }

    public function update(array $array, int $id)
    {
        $boutique = Boutique::where('id', $id)->first();
        return $this->save($boutique, $array);
    }

    public function delete($id)
    {
        $boutique = Boutique::where('id', $id)->first();
        $boutique->delete();
        return $boutique;
    }
}
