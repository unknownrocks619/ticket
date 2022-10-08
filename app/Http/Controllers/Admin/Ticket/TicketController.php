<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Ship;
use App\Models\Station;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //

    public function create()
    {
        $ships = Ship::get();
        $stations = Station::get();
        return view('admin.ticket.create', compact("ships", "stations"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "passport_number" => "required",
            "address" => "required",
            "departure_date" => "required",
            "ship" => "required|exists:ships,id",
            "station" => "required|exists:stations,id"
        ]);

        $ticket = new Customer;
        $ticket->first_name = $request->first_name;
        $ticket->last_name = $request->last_name;
        $ticket->passport_number = $request->passport_number;
        $ticket->departure_date = $request->departure_date;
        $ticket->ticket_type = "one-way";
        $ticket->ticket_by = auth()->id();
        $ticket->serial_number = strtoupper(\Str::random(6));
        $ticket->ticket_station = $request->station;
        $ticket->ship = $request->ship;
        $ticket->status = "booked";
        $ticket->uuid = \Str::uuid(); //$request->uuid;

        try {
            $ticket->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Unable to create ticket");
            return back()->withInput();
        }

        session()->flash('success', "Ticket Created. Please print before starting new ticket.");
        return view('admin.ticket.print', compact("ticket"));
    }

    public function printableTicket(Customer $ticket)
    {
        return view('admin.ticket.print-content', compact('ticket'));
    }

    public function search(Request $request)
    {

        $ticket = Customer::where('serial_number', strtoupper($request->serial_number))->latest()->first();
        return view('admin.search.search-result', compact("ticket"));
    }

    public function checkIn()
    {
    }
}
