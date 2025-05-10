<?php

namespace App\Repositories;

use App\Models\Permissions;
use App\Models\Role;

/**
 * Class PermissionRepository.
 */
class PermissionRepository
{
    public function all()
    {
        return Permissions::all();
    }

    public function save(Permissions $permission, array $array): Permissions
    {
        $permission->ability_id = $array['ability_id'];
        $permission->entity_id = $array['entity_id'];
        $permission->entity_type = Role::class;
        $permission->save();
        return $permission;
    }

    public function show(int $id)
    {
        return Permissions::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $permission = new Permissions();
        return $this->save($permission, $array);
    }

    public function update(array $array, int $id)
    {
        $permission = Permissions::where('id', $id)->first();
        return $this->save($permission, $array);
    }

    public function delete($id)
    {
        $permission = Permissions::where('id', $id)->first();
        $permission->delete();
        return $permission;
    }
}
