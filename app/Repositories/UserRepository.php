<?php

namespace App\Repositories;

use App\Http\Controllers\UserController;
use App\Models\User;
use Auth;
use Hash;
use Silber\Bouncer\Bouncer;
use Str;

//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository
{
    public function all()
    {
        return User::with('coach_category', 'player_category')->get();
    }

    public function save(User $user, array $array): User
    {
        $user->name = $array['name'];
        $user->name = $array['firstname'];
        $user->login = $array['name'];
        $user->email = $array['email'];
        $user->phone = array_key_exists('phone', $array) ? $array['phone'] : null;
        $user->is_actif = array_key_exists('is_actif', $array) ? $array['is_actif'] : false;
        $user->is_bureau = $array['is_bureau'];
        $user->is_coach = $array['is_coach'];
        $user->is_benevole = $array['is_benevole'];
        $user->is_player = $array['is_player'];
        $user->bureau_fonction = array_key_exists('bureau_fonction', $array) ? $array['bureau_fonction'] : null;
        $user->picture = $array['picture_name'];
        $user->birthday = $array['birthday'];
        $user->coach_category = array_key_exists('coach_category', $array) ? $array['coach_category'] : null;
        $user->player_category = array_key_exists('player_category', $array) ? $array['player_category'] : null;

        $user->password = $this->generatePassword($user, $array['password']);

        $user->save();

        foreach ($array['role'] as $role) {
            Bouncer::assign($role)->to($user);
        }
        return User::where('id', $user->id)->with('coach_category', 'player_category')->first();
    }

    public function show(int $id)
    {
        return User::where('id', $id)->with('coach_category', 'player_category')->first();
    }

    public function store(array $array)
    {
        $user = new User();
        return $this->save($user, $array);
    }

    public function update(array $array, int $id)
    {
        $user = User::where('id', $id)->first();
        if (Hash::make($array['last_password']) === $user->password) {
            return $this->save($user, $array);
        }
    }

    public function updatePassword(array $array)
    {
        // if (Auth::check()) {
        //     $user = User::where('email', $array['email'])->first();
        //     if(Auth::getUser()===$user){

        //     }
        //     if ($user->is_actif) {
        //         Auth::getUser();
        //     } else {
        //         return false;
        //     }
        // } else {
        //     $user = User::where('email', $array['email'])->first();

        //     if ($array['birthday'] === $user->birthday) {
        //         $user->is_actif = true;
        //         $user->password = Hash::make($array['password']);
        //         $user->save();

        //         return true;
        //     }
        // }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return $user;
    }

    public function generatePassword(User $user, String $password): string
    {
        if ($user->is_actif && $user->password !== null && $password === null) {
            return $user->password;
        } else if ($user->is_actif && $password !== null) {
            return Hash::make($password);
        } else if (!$user->is_actif && $password === null) {
            return Hash::make(str(random_int(0, 10000)) . Str::random(30) . str(random_int(0, 10000)));
        }
    }


    public function organigramme()
    {
        $result = [];
        $bureau = User::where('is_bureau', true)->get();
        $coach = User::with('coach_category')->where('is_coach', true)->get();
        $beneveoles = User::where('is_benevole', true)->get();

        $result['bureau'] = $bureau;
        $result['coach'] = $coach;
        $result['benevoles'] = $beneveoles;

        return $result;
    }

    public function players()
    {
        return User::with('player_category')->where('is_player', true)->get();
    }

    public function playersByCategory(int $category)
    {
        return User::with('player_category')->where('is_player', true)->where('player_category', $category)->get();
    }

    public function login(array $array)
    {
        $user = User::firstWhere('email', $array['email']);


        if (!$user || !Hash::check($array['password'], $user->password)) {
            return json_encode([
                'message' => 'Identifiants de connexion incorrects.'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return json_encode([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
