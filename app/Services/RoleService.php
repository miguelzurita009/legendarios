<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function getAll()
    {
        return Role::latest()->get();
    }

    public function create($data)
    {
        return Role::create($data);
    }

    public function update($id, $data)
    {
        $role = Role::findOrFail($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        return Role::destroy($id);
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }
}
