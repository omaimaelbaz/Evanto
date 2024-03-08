<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;


class OrganizateurController extends Controller
{
    public function organizateur()
    {
        return view('organizateur.index');
    }

    public function aficherevent()
{
    $events = Event::all();
    $categories = Category::all();

    return view('organizateur.event', compact('events', 'categories'));
}

}
