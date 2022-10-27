<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Ship;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seats = Seat::get();
        $ships = Ship::get();
        return view('admin.seats.index', compact('seats', "ships"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "seat_name" => "required",
            "seat_price" => "required"
        ]);

        $seat = new Seat();
        $seat->seat_name = $request->seat_name;
        $seat->slug = \Str::slug($request->seat_name, "-");
        $seat->price_for_seat = $request->seat_price;

        try {
            $seat->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Unable to create new record.");
            return back()->withInput();
        }

        session()->flash("success", "Seat information created.");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
        return view('admin.seats.edit', compact("seat"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        return view('admin.seats.edit', compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
        //
        $seat->seat_name = $request->seat_name;
        $seat->slug = \Str::slug($request->seat_name, "-");
        $seat->price_for_seat = $request->price_for_seat;

        try {
            $seat->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "unable to update record.");
            return back()->withInput();
        }

        session()->flash("success", "Information Updated.");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
        $seat->delete();

        session()->flash('success', "Seat information deleted.");
        return back();
    }

    public function ticketPrice(Request $request)
    {
        $seat = Seat::findOrFail($request->seat);
        return response(["price" => $seat->price_for_seat]);
    }
}
