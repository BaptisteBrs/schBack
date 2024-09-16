<?php

namespace App\Repositories;

use App\Models\Convocation;
use App\Models\ConvocationPlayer;
use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Date;
use DateTime;

//use Your Model

/**
 * Class ConvocationRepository.
 */
class ConvocationRepository
{

    const CODE = "9K34L7";
    public function all()
    {
        if (Auth::user() == null || Auth::user()->coach_category == null || Auth::user()->isAn('admin')) {
            return Convocation::with('convocation_players.player', 'game.team', 'game.type', 'team', 'category')
                ->orderby('date', 'desc')
                ->get();
        } else {
            $category = Auth::user()->coach_category;
            return Convocation::with('convocation_players.player', 'game.team', 'game.type', 'team', 'category')
                ->whereHas('team', function ($query) use ($category) {
                    $query->where('category', $category);
                })
                ->orderby('date', 'desc')
                ->get();
        }
    }


    public function save(Convocation $convocation, array $array)
    {
        $team = Team::where('id', $array['team'])->first();
        $convocation->appointment = array_key_exists('appointment', $array) ? $array['appointment'] : null;
        $convocation->game = array_key_exists('game', $array) ? $array['game'] : null;
        $convocation->date = $array['date'];
        $convocation->category = $array['category'] != null ? $array['category'] : $team->category;
        $convocation->team = $array['team'];
        $convocation->no_game = array_key_exists('no_game', $array) ? $array['no_game'] : false;
        $convocation->comment = array_key_exists('comment', $array) ? $array['comment'] : null;
        $convocation->is_cacher = array_key_exists('is_cacher', $array) ? $array['is_cacher'] : null;
        $convocation->responsable_id = array_key_exists('responsable_id', $array) ? $array['responsable_id'] : null;
        $convocation->save();

        $players_before_in_list = ConvocationPlayer::where('convocation', $convocation->id)->delete();

        foreach ($array['players'] as $player_conv) {
            $convocation_player = new ConvocationPlayer();
            $convocation_player->player = $player_conv['player'];
            $convocation_player->convocation = $convocation->id;
            $convocation_player->is_driver =  $player_conv['is_driver'];
            $convocation_player->is_shirt = $player_conv['is_shirt'];
            $convocation_player->is_cleaner = $player_conv['is_cleaner'];

            $convocation_player->save();
        }
        $convocation = Convocation::where('id', $convocation->id)->with('convocation_players.player', 'game.team', 'game.type', 'team', 'category')->first();
        return $convocation;
    }

    public function show(int $id)
    {
        return Convocation::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $convocation = new Convocation();
        return $this->save($convocation, $array);
    }

    public function update(array $array, int $id)
    {
        $convocation = Convocation::where('id', $id)->first();
        return $this->save($convocation, $array);
    }

    public function delete($id)
    {
        $convocation = Convocation::where('id', $id)->first();
        $convocation->delete();
        return $convocation;
    }


    public function lastByCategory(int $category, int $code = null)
    {
        if ($category == 1 && $code != $this::CODE) {
            return abort(404);
        }
        $teams = Team::where('category', $category)->get();
        $date = now()->toDateString('Y-m-d');
        $convocations = Convocation::with('convocation_players.player', 'game.team', 'game.type', 'team', 'category', 'responsable')->where('category', $category)->where('date', '>=', $date)->where('is_cacher', false)->orderBy('date', 'asc')->get();

        $result = [];
        foreach ($teams as $team) {

            $convocation = $convocations->where('team', $team->id)->first();
            if ($convocation == null) {
                $date = now();
                $date->subDays(7);
                $convocation = Convocation::with('convocation_players.player', 'game.team', 'game.type', 'team', 'category', 'responsable')->where('team', $team->id)->where('date', '>=', $date)->where('is_cacher', false)->orderBy('date', 'asc')->first();
            }

            if ($convocation != null) {
                array_push($result, $convocation);
            }
        }
        return $result;
    }

    public function selectedPlayersByCategory(string $date)
    {
        $result = [];

        $date_min = new DateTime($date);
        $date_min->modify("-1 day");
        $date_max = new DateTime($date);
        $date_max->modify("+1 day");


        $players = User::where('is_player', true)->get();
        $convocations = Convocation::where('date', '>=', $date_min)->where('date', '<=', $date_max)->with('convocation_players.player')->get();

        foreach ($convocations as $convocation) {
            $convocation_players = $convocation->convocation_players;
            foreach ($convocation_players as $conv_player) {
                foreach ($players as $player) {
                    if ($conv_player->player == $player->id && !in_array($player->id, $result)) {

                        array_push($result, $player->id);
                    }
                }
            }
        }

        return $result;
    }
}
