<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function all_roles()
    {
        $roles = [];
        foreach (Role::all() as $role)
        {
            array_push($roles, $role->name);
        }
        return $roles;
    }
}
