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
        if($tickets = Ticket::where('session_id', $session_id)->with('payment')->get()) {
            return response()->json($tickets);
        }
        return response()->json();
    }

    public function store(Request $request, $movie_id, $session_id)
    {
        if ($seats = $request->input('seats')) {

            $movie = Movie::find($movie_id);

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

                return response()->json($payment->load('tickets.session.movie'));
            }

            return response()->json();
        }

        return response()->json();
    }
}
