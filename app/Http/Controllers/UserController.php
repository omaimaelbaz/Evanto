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

    public function checkStatus($id)
{
    $user = User::find($id);
    if($user)
    {
        if($user->status)
        {
            $user->status = '0';
        }
        else
        {
            $user->status = '1';

      }
      $user->save();

}
return back();
}

}
