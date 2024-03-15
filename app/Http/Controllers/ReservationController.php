<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets; // Importer le modèle Ticket
use App\Models\Event;

class ReservationController extends Controller
{
    public function reserver(Request $request, $id)
    {
        // Créer une nouvelle réservation
        $reservation = new Tickets();



        $reservation->user_id = auth()->user()->id;
        // dd($reservation);
        $reservation->event_id = $id;



        $event = Event::find($id);

        if ($event->acceptType == 'auto') {
            if($event->available_seats == 0) {

            Tickets::create([
                "user_id" => auth()->user()->id,
                "event_id" => $id,
                "isAccept" => "1",

            ]);
        }
            $event->available_seats =$event ->available_seats -1;
            $event->save();


        }


        else {
            // Si l'acceptation n'est pas automatique

            Tickets::create([
                "user_id" => auth()->user()->id,
                "event_id" => $id,
                "isAccept" => "0",
            ]);
            $event->available_seats =$event ->available_seats -1;
            $event->save();
        }
        // Retourner une réponse
        return response('Réservation effectuée avec succès', 200);
    }

    public function approved()
    {
        $event = Event::all();
        
    }







}


