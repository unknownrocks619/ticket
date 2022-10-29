<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ships = Ship::latest()->get();
        return view('admin.ship.index_updated', compact('ships'));
        return view('admin.ship.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ship.create');
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
            "ship_number" => "required",
        ]);
        try {
            Ship::create($request->only("ship_number"));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash("error", "Unable to create record.");
            return back();
        }


        session()->flash('success', "Ship Information Added.");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ship $ship)
    {
        //
        return view('admin.ship.edit_updated', compact("ship"));
        return view('admin.ship.edit', compact("ship"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ship $ship)
    {
        $request->validate([
            "ship_number" => "required"
        ]);
        //
        $ship->ship_number = $request->ship_number;

        try {
            $ship->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "unable to update ship detail.");
            return back();
        }
        session()->flash("success", "Ship information updated");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ship $ship)
    {
        //
        try {
            $ship->delete();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Unable to remove ship information.");
            return back();
        }
        session()->flash('success', 'Ships Information removed.');
        return back();
    }
}
