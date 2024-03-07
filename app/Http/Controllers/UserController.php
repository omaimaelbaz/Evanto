<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function users()
    {
        $users = new User();
        $role = new Role();
        $data = $users->with('roles')->get();



        return view('admin.user', compact('data', 'role'));

    }
}
