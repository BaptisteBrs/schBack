<?php

namespace App\Repositories;

use App\Models\Abilities;

/**
 * Class AbilitiesRepository.
 */
class AbilitiesRepository
{
    public function all()
    {
        return Abilities::all();
    }

    public function save(Abilities $abilitie, array $array): Abilities
    {
        $abilitie->name = $array['name'];
        $abilitie->title = $array['title'];
        $abilitie->save();
        return $abilitie;
    }

    public function show(int $id)
    {
        return Abilities::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $abilitie = new Abilities();
        return $this->save($abilitie, $array);
    }

    public function update(array $array, int $id)
    {
        $abilitie = Abilities::where('id', $id)->first();
        return $this->save($abilitie, $array);
    }

    public function delete($id)
    {
        $abilitie = Abilities::where('id', $id)->first();
        $abilitie->delete();
        return $abilitie;
    }
}
