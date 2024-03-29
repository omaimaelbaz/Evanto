<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
   public function register()
   {
    return view('user.signUp');
   }
   public function login()
   {
    return view('user.signIn');
   }
   public function RegisterUser(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'role'=>'required',

    ]);

    // dd($request->all()
    $user = User::create($request->all());
    if($user){
        $roleId = $request->input('role');
        $user->roles()->attach($roleId);
        return redirect('/signIn');
    }
}

   public function loginUser(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(auth()->attempt($request->only('email', 'password'))){
        if(auth()->user()->roles->first()->name == 'admin'){
            return redirect('/admin');
        }
        if(auth()->user()->roles->first()->name == 'organisateur'){
            return redirect('/organizateur');
        }
        return redirect('/');
    }else{
        return redirect('/signIn');
    }
}
public function logout(){
    auth()->logout();
    return redirect('/');
}

public function getCurrentUserId() {
    if(auth()->check()) {
        $user = auth()->user();
        $userId = $user->id;
        $userName = $user->name;
        return "ID: $userId, Name: $userName";
    } else {
        return "No one is currently connected.";
    }
}


}

