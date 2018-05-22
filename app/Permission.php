<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Give user given permission.
     *
     * @param $permission
     * @param User $user
     */
    public static function grantForUser($permission, User $user)
    {
        UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => $permission,
        ]);
    }
}
