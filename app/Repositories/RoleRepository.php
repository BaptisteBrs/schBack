<?php

namespace App\Repositories;

use App\Models\Role;

//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository
{
    public function all()
    {
        return Role::all();
    }

    public function save(Role $role, array $array): Role
    {
        $role->name = $array['name'];
        $role->title = $array['title'];
        $role->save();
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
