<?php

namespace App\Repositories;

use App\Models\Convocation;
use App\Models\ConvocationPlayer;
use App\Models\Team;
use App\Models\User;
use Date;

//use Your Model

/**
 * Class ConvocationRepository.
 */
class ConvocationRepository
{
    public function all()
    {
        return Convocation::with('players', 'game')->get();
    }

    public function last()
    {
        return Convocation::with('players', 'game')->get();
    }

    public function save(Convocation $convocation, array $array): Convocation
    {
        $convocation->appointment = $array['appointment'];
        $convocation->game = $array['game'];
        $convocation->save();

        foreach ($array['players'] as $player_conv) {
            $convocation_player = new ConvocationPlayer();
            $convocation_player->player = $player_conv->player;
            $convocation_player->convocation = $convocation;
            $convocation_player->is_driver =  $player_conv->is_driver;
            $convocation_player->is_shirt = $player_conv->is_shirt;
            $convocation_player->is_cleaner = $player_conv->is_cleaner;

            $convocation_player->save();
        }
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
        $teams = Team::where('category', $category)->get();
        $convocations = Convocation::with('players', 'game')->where('category', $category)->get();
        $result = [];
        foreach ($teams as $team) {
            $convocation = $convocations->where('team', $team->id);
            array_push($result, $convocation);
        }
        return $result;
    }

    public function selectedPlayersByCategory(int $category, Date $date)
    {
        $result = [];

        $players = User::where('is_player', true)->where('player_category', $category)->get();
        $convocations = Convocation::where('category', $category)->whereHas('game', function ($query, $date) {
            return $query->where('date', $date);
        })->get();

        foreach ($convocations as $convocation) {
            $convocations_players = ConvocationPlayer::where('convocation', $convocation->id)->get();
            foreach ($players as $player) {
                if ($convocations_players->where('player', $player->id)->count > 0) {
                    array_push($result, $player);
                }
            }
        }

        return $result;
    }
}
