<?php

namespace App\Repositories;

use App\Models\Team;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TeamRepository.
 */
class TeamRepository
{
    public function all()
    {
        return Team::with('category')->get();
    }

    public function save(Team $team, array $array): Team
    {
        $team->name = $array['name'];
        $team->league = array_key_exists('league', $array) ? $array['league'] : null;
        $team->category = $array['category'];
        $team->save();
        return $team;
    }

    public function show(int $id)
    {
        return Team::where('id', $id)->with('category')->first();
    }

    public function store(array $array)
    {
        $team = new Team();
        return $this->save($team, $array);
    }

    public function update(array $array, int $id)
    {
        $team = Team::where('id', $id)->first();
        return $this->save($team, $array);
    }

    public function delete($id)
    {
        $team = Team::where('id', $id)->first();
        $team->delete();
        return $team;
    }
}
