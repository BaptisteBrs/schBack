<?php

namespace App\Repositories;

use App\Models\Role;
use Bouncer;
use Str;

//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository
{
    public function all()
    {
        return Role::with('abilities')->get();
    }

    public function save(Role $role, array $array): Role
    {
        $role->name = $array['name'];
        $role->title = array_key_exists('title', $array) ? $array['title'] : Str::ucfirst($array['name']);
        $role->save();

        $role = Role::with('abilities')->where('id', $role->id)->first();

        if ($role->name != 'admin') {

            if ($array['abilities'] != null) {
                foreach ($role->abilities as $ability) {
                    Bouncer::disallow($role)->to($ability);
                }

                foreach ($array['abilities'] as $ability) {
                    Bouncer::allow($role)->to($ability);
                }
            }
        }

        $role = Role::with('abilities')->where('id', $role->id)->first();

        return $role;
    }

    public function show(int $id)
    {
        return Role::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $role = new Role();
        return $this->save($role, $array);
    }

    public function update(array $array, int $id)
    {
        $role = Role::where('id', $id)->first();
        return $this->save($role, $array);
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return $role;
    }
}
