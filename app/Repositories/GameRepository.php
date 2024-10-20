<?php

namespace App\Repositories;

use App\Models\ArticleType;
use App\Models\Category;
use App\Models\Convocation;
use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Auth;
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

        if (Auth::user()->coach_category == null || Auth::user()->isAn('admin')) {
            return Game::with('type', 'team.category')->orderBy('date', 'desc')->get();
        } else {
            $category = Auth::user()->coach_category;
            return Game::with('type', 'team.category')
                ->whereHas('team', function ($query) use ($category) {
                    $query->where('category', $category);
                })
                ->orderBy('date', 'desc')->get();
        }
    }

    public function allNotFinish()
    {

        if (Auth::user()->coach_category == null || Auth::user()->isAn('admin')) {
            $games = Game::with('type', 'team.category')->where('is_finish', false)->where('date', '>=', Carbon::today())->orderBy('date', 'asc')->get();
        } else {
            $category = Auth::user()->coach_category;

            $games = Game::with('type', 'team.category')
                ->whereHas('team', function ($query) use ($category) {
                    $query->where('category', $category);
                })
                ->where('is_finish', false)
                ->where('date', '>', Carbon::today())
                ->orderBy('date', 'asc')->get();
        }
        // $convocations = Convocation::whereIn('game', array_column($games, 'id'))->get();
        // $gamesInConvocations = array_column($convocations->toArray(), 'game');
        // $filtered_matchs = array_filter($games, function ($match) use ($gamesInConvocations) {
        //     return !in_array($match['id'], $gamesInConvocations);
        // });
        return $games;
    }

    public function save(Game $game, array $array): Game
    {
        $game->date = $array['date'];
        $game->place = array_key_exists('place', $array) ? $array['place'] : false;
        $game->opponent = $array['opponent'];
        $game->sch_goals = $array['sch_goals'] != null ? $array['sch_goals'] : 0;
        $game->opponent_goals = $array['opponent_goals'] != null ? $array['opponent_goals'] : 0;
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


    public function allNext()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-dofa.fff.fr/api/clubs/1417/matchs?ma_dat%5Bbefore%5D=2024-02-04&ma_dat%5Bafter%5D=2024-01-29&page=1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $result = json_decode($response, true);

        $team = Team::all();
        $res = [];

        foreach ($result['hydra:member'] as $gameApi) {
            $game = new Game();
            $game->date = $gameApi['date'];
            $game->place = $gameApi['terrain']['city'];
            $game->opponent = !str_contains($gameApi['home']['short_name'], 'HERBIGNAC') ? $gameApi['home']['short_name'] : $gameApi['away']['short_name'];
            $game->sch_goals = 0;
            $game->opponent_goals = 0;
            $game->is_home = !str_contains($gameApi['home']['short_name'], 'HERBIGNAC') ? false : true;
            $game->is_finish = false;
            $game->is_win =  null;
            $game->is_lose = null;
            $game->is_draw =  null;
            $game->team = null;
            $game->hour = $gameApi['time'];
            $game->idApi = $gameApi['@id'];
            $game->opponentLogo = !str_contains($gameApi['home']['short_name'], 'HERBIGNAC') ? $gameApi['home']['club']['logo'] : $gameApi['away']['club']['logo'];
            $game->schLogo = !str_contains($gameApi['home']['short_name'], 'HERBIGNAC') ? $gameApi['away']['club']['logo'] : $gameApi['home']['club']['logo'];


            array_push($res, $game);
        }

        return $team;
    }
}
