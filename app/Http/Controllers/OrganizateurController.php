<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Tickets;



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

public function addevent()
{

    $events = Event::all();
    $categories = Category::all();

    return view('organizateur.addevent',compact('events', 'categories'));

}

public function insert(Request $request)

{
    //  dd($request);
      // Validation  du formulaire
      $validatedData = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string',
        'price' => 'nullable|numeric',
        'acceptType' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'available_seats' => 'nullable'
    ]);
     $event = new Event;
     $event->title = $validatedData['title'];
     $event->description = $validatedData['description'];
     $event->date = $validatedData['date'];
     $event->location = $validatedData['location'];
     $event->price = $validatedData['price'];
     $event->user_id = auth()->user()->id;
     $event->acceptType = $validatedData['acceptType'];
     $event->category_id = $validatedData['category_id'];
     $event->available_seats = $validatedData['available_seats'];



     $event->save();

    return redirect('/organizateur');

}
public function updateevent($id)
{
    $events = Event::find($id);
    $categories = Category::all();
    return view('organizateur.updateevent',compact('events', 'categories'));
}
public function editeEvent(Request $request ,$id)
{
      // Validation  du formulaire
      $validatedData = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string',
        'price' => 'nullable|numeric',
        'acceptType' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'available_seats' => 'nullable|numeric'
    ]);
    $event = Event::findOrFail($id);

    // $event->title = $validatedData['title'];
    // $event->description = $validatedData['description'];
    // $event->date = $validatedData['date'];
    // $event->location = $validatedData['location'];
    // $event->price = $validatedData['price'];
    // $event->acceptType = $validatedData['acceptType'];
    // $event->category_id = $validatedData['category_id'];
    // $event->available_seats = $validatedData['available_seats'];

    // $event->save();
     Event::findOrFail($id)->update($validatedData);

    return redirect('/organizateur');




}
public function delete($id)
{
   $event = Event::findOrFail($id);
   $event->delete();
   return redirect('/event');
}
public function ReservationView()
{
    $event = Event::all();

    $reservations = Tickets::where('isAccept', '0')->get();
    // dd($reservations);

    return view('organizateur.reservation', compact('reservations','event'));

}

public function approved()
{

}


}

