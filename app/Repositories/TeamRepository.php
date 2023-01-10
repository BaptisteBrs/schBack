<?php

namespace App\Repositories;

use App\Models\Convocation;
use App\Models\Game;
use App\Models\Team;
use DateTime;
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

    public function noGameTeams(string $date)
    {

        $date_min = new DateTime($date);
        $date_min->modify("-1 day");
        $date_max = new DateTime($date);
        $date_max->modify("+1 day");

        $convocations = Convocation::where('date', '>=', $date_min)->where('date', '<=', $date_max)->with('team')->get();
        $teams = Team::get();

        $result = [];

        foreach ($teams as $team) {
            array_push($result, $team);
            foreach ($convocations as $convocation) {
                $conv_team = $convocation->team;
                if ($conv_team === $team->id && in_array($team, $result)) {
                    $index = array_search($team, $result);
                    unset($result[$index]);
                }
            }
        }

        return $result;
    }

    public function noGameTeamsForGames(string $date)
    {

        $date_min = new DateTime($date);
        $date_min->modify("-1 day");
        $date_max = new DateTime($date);
        $date_max->modify("+1 day");

        $games = Game::where('date', '>=', $date_min)->where('date', '<=', $date_max)->with('team')->get();
        $teams = Team::get();

        $result = [];

        foreach ($teams as $team) {
            array_push($result, $team);
            foreach ($games as $game) {
                $game_team = $game->team;
                if ($game_team === $team->id && in_array($team, $result)) {
                    $index = array_search($team, $result);
                    unset($result[$index]);
                }
            }
        }

        return $result;
    }
}
