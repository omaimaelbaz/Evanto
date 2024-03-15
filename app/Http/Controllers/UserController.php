<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tickets;
use App\Models\Role;
use App\Models\Category;


class UserController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $category = Category::all();
        return view('user.index',compact('events', 'category'));

    }
    public function aficherdetails($id)
    {
        $events = Event::with('category')->where('id',$id)->first();
        return view('user.details', compact('events' ));
    }
    public function users()
    {
        $users = new User();
        $role = new Role();
        $data = $users->with('roles')->get();



        return view('admin.user', compact('data', 'role'));

    }
    public function adminDashboard(){
        $statistique = [
            'users' => User::count(),
            'categories' => Category::count(),
            'Ticket' => Tickets::count(),
            'Event'=> Event::count()
        ];
        return view('admin.index', compact('statistique'));
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
public function ReservationView()
{
    return view('user.reservation');
}

public function searchEvent($value)
{
    $events = Event::where('title', 'like', '%'.$value.'%')->get();
    return view('user.searchEvent',compact('events'));
}
public function filterEvent($value)
{
    $events = Event::where('category_id',$value)->get();
    return view('user.searchEvent',compact('events'));
}
public function AcceptEventOrganisateur(){
    $events = Event::where('status','refuse')->paginate(1);
    return view('admin.acceptEevent', compact('events') );
}
public function acceptRefuseEvet($action, $id){
    if($action == "accept"){
        $event = Event::find($id);
        $event->status = 'accept';
        $event->save();
    }else {
        Event::find($id)->delete();
    }
    return redirect('/AcceptEventOrganisateur');
}
}
