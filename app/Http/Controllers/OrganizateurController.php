<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizateurController extends Controller
{
    public function organizateur()
    {
        return view('organizateur.index');
    }
}
