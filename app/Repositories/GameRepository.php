<?php

namespace App\Repositories;

use App\Models\Game;
use App\Models\Team;

//use Your Model

/**
 * Class GameRepository.
 */
class GameRepository
{
    public function all()
    {
        return Game::with('type', 'category', 'team')->get();
    }

    public function save(Game $game, array $array): Game
    {
        $game->date = $array['date'];
        $game->place = $array['place'];
        $game->opponent = $array['opponent'];
        $game->sch_goals = $array['sch_goals'];
        $game->opponent_goals = $array['opponent_goals'];
        $game->team = $array['team'];
        $game->game = $array['game'];
        $game->hour = $array['hour'];
        $game->comment = $array['comment'];
        $game->is_home = $array['is_home'];
        $game->is_finish = array_key_exists('is_finish', $array) ? $array['is_finish'] : false;
        $game->is_win = $game->is_finish ? ($game->sch_goals > $game->opponent_goals ? true : false) : null;
        $game->is_lose = $game->is_finish ? ($game->sch_goals < $game->opponent_goals ? true : false) : null;;
        $game->is_draw = $game->is_finish ? ($game->sch_goals = $game->opponent_goals ? true : false) : null;;
        $game->category = $array['category'];
        $game->save();
        return $game;
    }

    public function show(int $id)
    {
        return Game::where('id', $id)->with('type', 'category', 'team')->first();
    }

    public function store(array $array)
    {
        $game = new Game();
        return $this->save($game, $array);
    }

    public function update(array $array, int $id)
    {
        $game = Game::where('id', $id)->first();
        return $this->save($game, $array);
    }

    public function delete($id)
    {
        $game = Game::where('id', $id)->first();
        $game->delete();
        return $game;
    }

    public function last()
    {
        $date = date('Y-m-d');
        $games = Game::where('date', '<=', $date)->where('is_finish', true)->orderBy('date')->get();
        $teams = Team::all();
        $result = [];

        foreach ($teams as $team) {
            $game = $games->firstWhere('team', $team->id);
            array_push($result, $game);
        }
        return $result;
    }

    public function next()
    {
        $date = date('Y-m-d');
        $games = Game::with('type', 'category', 'team')->where('date', '>=', $date)->where('is_finish', false)->orderBy('date')->get();
        $teams = Team::all();
        $result = [];

        foreach ($teams as $team) {
            $game = $games->firstWhere('team', $team->id);
            array_push($result, $game);
        }
        return $result;
    }
}
