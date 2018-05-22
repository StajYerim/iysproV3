<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Constants for defined roles.
     * May be used statically.
     */
    const ADMIN = 1;
    const ACCOUNT_OWNER = 2;
    const USER = 3;
}
