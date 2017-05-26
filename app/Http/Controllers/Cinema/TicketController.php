<?php

namespace App\Http\Controllers\Cinema;

use App\Movie;
use App\Payment;
use App\Session;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index($movie_id, $session_id)
    {
        if($tickets = Ticket::where('session_id', $session_id)->get()) {
            return response()->json(compact('tickets'));
        }
        return response()->json();
    }

    public function store(Request $request, $session_id)
    {
        if ($seats = $request->input('seats')) {

            $movie = Session::find($session_id)->movie();

            $amount = count($seats) * $movie->price;

            if ($payment = Payment::create([
                'member_id' => session('user')['id'],
                'amount' => $amount,
            ])
            ) {
                foreach ($seats as $seat) {
                    $ticket = new Ticket();
                    $ticket->session_id = $session_id;
                    $ticket->payment_id = $payment->id;
                    $ticket->seat = $seat;
                    $ticket->save();
                }

                return response()->json();
            }

            return response()->json();
        }

        return response()->json();
    }
}
