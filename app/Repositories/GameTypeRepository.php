<?php

namespace App\Repositories;

use App\Models\GameType;

//use Your Model

/**
 * Class GameTypeRepository.
 */
class GameTypeRepository
{
    public function all()
    {
        return GameType::all();
    }

    public function save(GameType $game_type, array $array): GameType
    {
        $game_type->name = $array['name'];
        $game_type->icon = array_key_exists('icon', $array) ? $array['icon'] : null;
        $game_type->save();
        return $game_type;
    }

    public function show(int $id)
    {
        return GameType::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $game_type = new GameType();
        return $this->save($game_type, $array);
    }

    public function update(array $array, int $id)
    {
        $game_type = GameType::where('id', $id)->first();
        return $this->save($game_type, $array);
    }

    public function delete($id)
    {
        $game_type = GameType::where('id', $id)->first();
        $game_type->delete();
        return $game_type;
    }
}
