<?php

namespace App\Http\Controllers\Modules\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where("account_id",aid())->paginate(10);
        return view("modules.settings.users.index",compact("users"));
    }
}
