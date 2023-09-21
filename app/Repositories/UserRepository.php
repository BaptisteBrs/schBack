<?php

namespace App\Repositories;

use App\Mail\ForgotPasswordMail;
use App\Mail\Test;
use App\Models\Role;
use App\Models\User;
use Hash;
use Bouncer;
use Carbon\Carbon;
use Exception;
use Str;
use Illuminate\Support\Facades\Mail;


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

    public function alllogin()
    {
        return User::get('login');
    }

    public function save(User $user, array $array)
    {
        $is_create = false;
        if ($user->login == null) {
            $is_create = true;
            $cmp = 1;
            $allLogin = User::withTrashed()->get('login')->toArray();
            $login = strtoupper($array['firstname'][0]) . Str::ucfirst($array['name']);
            return json_encode(in_array($login, $allLogin));
            while (in_array($login, $allLogin)) {
                $login = $login . str($cmp);
                $cmp += 1;
            }

            $user->login = $login;
        } else {
            $user->login = $user->login;
        }

        $user->name = strtoupper($array['name']);
        $user->firstname = $array['firstname'];
        $user->email = array_key_exists('email', $array) ? $array['email'] : null;
        $user->phone = array_key_exists('phone', $array) ? $array['phone'] : null;
        $user->is_actif = array_key_exists('is_actif', $array) ? $array['is_actif'] : false;
        $user->is_bureau = $array['is_bureau'];
        $user->is_coach = $array['is_coach'];
        $user->is_benevole = $array['is_benevole'];
        $user->is_player = $array['is_player'];
        $user->bureau_fonction = array_key_exists('bureau_fonction', $array) ? $array['bureau_fonction'] : null;
        $user->picture = $array['picture_name'];
        $user->birthday = array_key_exists('birthday', $array) ? $array['birthday'] : null;
        $user->coach_category = array_key_exists('coach_category', $array) ? $array['coach_category'] : null;
        $user->player_category = array_key_exists('player_category', $array) ? $array['player_category'] : null;

        $user->save();
        $user = User::with('roles')->where('id', $user->id)->first();
        if (!$user->isAn('admin')) {
            if ($user->roles != null && count($user->roles) > 0) {
                Bouncer::retract($user->roles->name)->from($user);
                $abilities = $user->getAbilities();
                foreach ($abilities as $ability) {
                    Bouncer::disallow($user)->to($ability->name);
                }
                Bouncer::assign($array['role'])->to($user);
                $role = Role::with('abilities')->where('name', $array['role'])->first();
                foreach ($role->abilities as $ability) {
                    Bouncer::allow($user)->to($ability->name);
                }
            } else {
                Bouncer::assign($array['role'])->to($user);
                $role = Role::with('abilities')->where('name', $array['role'])->first();
                foreach ($role->abilities as $ability) {
                    Bouncer::allow($user)->to($ability->name);
                }
            }
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
        $array['password'] = Hash::make(Str::random(30));
        return $this->save($user, $array);
    }

    public function update(array $array, int $id)
    {
        $user = User::where('id', $id)->first();
        return $this->save($user, $array);
    }

    public function firstConnexion(array $array)
    {
        $email = $array['email'];
        $user = User::where('email', $email)->first();
        if (!$user || !$user->is_actif) {
            return abort(404, "Rapprocher vous d'un administrateur pour vous connecter!");
        }
        $user->code_first_connexion = rand(0, 999999999999);
        $now = Carbon::now();
        $user->code_created_at = $now;
        $user->code_expired_at = $now->addMinutes(5);
        $user->save();

        if (!$user) {
            return abort(200, "Un mail a été envoyé si votre adresse mail est connue de notre système.");
        }
        try {
            Mail::to($email)
                ->send(new ForgotPasswordMail($user));

            return "Un mail a été envoyé si votre adresse mail est connue de notre système.";
        } catch (Exception $ex) {
            return $ex;
            return abort(404, "Erreur d'envoi du mail");
        }
    }

    public function updatePassword(array $array)
    {
        $email = $array['email'];
        $user = User::where('email', $email)->first();
        if (!$user) {
            return abort(404, "Impossible de modifier votre mot de passe");
        }
        if ($user->code_first_connexion == $array['code']) {
            if ($array['date'] <= $user->code_expired_at) {
                $user->password = Hash::make($array['password']);
                $user->is_actif = true;
                $user->save();
                return "Modification réalisée avec succès.\r\n Veuillez vous connectez avec vos nouvaux identifants";
            }
            return $user->code_expired_at;
            return abort(404, "Impossible de modifier votre mot de passe");
        }
        return $user->code_first_connexion;
        return abort(404, "Impossible de modifier votre mot de passe");
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return $user;
    }

    public function generatePassword(User $user, String $password = null): string
    {
        if ($user->is_actif && $user->password !== null && $password === null) {
            return $user->password;
        } else if ($user->is_actif && $password !== null) {
            return Hash::make($password);
        } else if (!$user->is_actif && $password === null) {
            return Str::random(30);
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
        return User::with('player_category')->where('is_player', true)->where('player_category', $category)->orderBy('name', 'asc')->get();
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
        $array_abilities = [];
        $abilities = $user->getAbilities();
        foreach ($abilities as $abilitie) {
            array_push($array_abilities, $abilitie->name);
        }

        return json_encode([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'abilities' => $array_abilities
        ]);
    }
}
