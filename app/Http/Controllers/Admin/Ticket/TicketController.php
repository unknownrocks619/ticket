<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Seat;
use App\Models\Ship;
use App\Models\Station;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

class TicketController extends Controller
{
    //

    public function create()
    {
        $ships = Ship::get();
        $stations = Station::get();
        $seats = Seat::get();
        return view('admin.ticket.create', compact("ships", "stations", "seats"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "passport_number" => "required",
            "address" => "nullable",
            "departure_date" => "required",
            "ship" => "required|exists:ships,id",
            "station" => "required|exists:stations,id",
            "price" => "required",
            "seat_class" => "required"
        ]);

        for ($i = 0; $i > 10; $i++) {
        }
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
        $ticket->price = $request->price;
        $ticket->seat_class = $request->seat_class;
        $ticket->uuid = \Str::uuid(); //$request->uuid;
        $ticket->country = $request->address;

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

        $ticket = Customer::with(["ship", "seat"]);

        if ($request->ticket_number) {
            $ticket->where("serial_number", $request->ticket_number);
            if ($request->departure_date) {
                $ticket->where('departure_date', $request->departure_date);
            }
        } elseif (!$request->ticket_number && $request->departure_date) {
            $ticket->where('departure_date', $request->departure_date);
        } elseif (auth()->user()->role == 1) {
        } else {
            $ticket->where('departure_date', date("Y-m-d"));
        }

        $tickets = $ticket->latest()->get();
        return view('admin.search.search-result', compact("tickets"));
    }

    public function checkInCreate()
    {
        return view('admin.search.boarding');
    }

    public function checkTicket(Request $request)
    {
        $request->validate([
            "qrReader" => "required"
        ]);

        // check 
        $customer = Customer::where("uuid", $request->qrReader)->orWhere('serial_number', $request->qrReader)->first();


        if ($customer) {
            $today = \Carbon\Carbon::now();
            $ticket_date_parse = \Carbon\Carbon::parse($customer->departure_date);
            if ($ticket_date_parse->isToday()) {

                if ($customer->status != "booked") {
                    return response([
                        "success" => false,
                        "message" => "Ticket has been " . ucwords($customer->status)
                    ]);
                }
                // update ticket
                $customer->status = "used";
                $customer->ticket_updated_by = auth()->id();
                $customer->save();
                return response([
                    "success" => true,
                    "message" => "Check-In Success"
                ]);
            } else {
                return response([
                    "success" => false,
                    "message" => "Please check your departure date."
                ]);
            }
        }

        return response([
            "success" => false,
            "message" => "Ticket Not Found"
        ]);
    }
}
