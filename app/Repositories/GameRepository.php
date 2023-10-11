<?php

namespace App\Repositories;

use App\Models\ArticleType;
use App\Models\Convocation;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Date;
use DateTime;

//use Your Model

/**
 * Class GameRepository.
 */
class GameRepository
{
    public function all()
    {
        return Game::with('type', 'team.category')->orderBy('date', 'desc')->get();
    }

    public function allNotFinish()
    {
        return Game::with('type', 'team.category')->where('is_finish', false)->where('date', '>', Carbon::today())->orderBy('date', 'asc')->get();
    }

    public function save(Game $game, array $array): Game
    {
        $game->date = $array['date'];
        $game->place = array_key_exists('place', $array) ? $array['place'] : false;
        $game->opponent = $array['opponent'];
        $game->sch_goals = array_key_exists('sch_goals', $array) ? $array['sch_goals'] : 0;
        $game->opponent_goals = array_key_exists('opponent_goals', $array) ? $array['opponent_goals'] : 0;
        $game->team = $array['team'];
        $game->type = $array['type'];
        $game->hour = $array['hour'];
        $game->comment = $array['comment'];
        $game->is_home = $array['is_home'];
        $game->is_finish = array_key_exists('is_finish', $array) ? $array['is_finish'] : false;
        $game->is_win = $game->is_finish ? ($array['sch_goals'] > $array['opponent_goals'] ? true : false) : null;
        $game->is_lose = $game->is_finish ? ($array['sch_goals'] < $array['opponent_goals'] ? true : false) : null;;
        $game->is_draw = $game->is_finish ? ($array['sch_goals'] = $array['opponent_goals'] ? true : false) : null;;
        $game->save();
        return Game::with('type', 'team.category')->where('id', $game->id)->first();
    }

    public function show(int $id)
    {
        return Game::where('id', $id)->with('type', 'team.category')->first();
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
        $games = Game::where('date', '<=', $date)->where('is_finish', true)->orderBy('date')->with('type', 'team.category')->get();
        $teams = Team::all();
        $result = [];

        foreach ($teams as $team) {
            $game = $games->firstWhere('team', $team->id);
            if ($game != null) {
                array_push($result, $game);
            }
        }
        return $result;
    }

    public function next()
    {
        $date = date('Y-m-d');
        $games = Game::with('type', 'team.category')->where('date', '>=', $date)->where('is_finish', false)->orderBy('date')->with('type', 'team.category')->get();
        $teams = Team::all();
        $result = [];

        foreach ($teams as $team) {
            $game = $games->firstWhere('team', $team->id);
            if ($game != null) {
                array_push($result, $game);
            }
        }
        return $result;
    }
}
