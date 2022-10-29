<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stations = Station::latest()->get();
        return view('admin.stations.index_updated', compact('stations'));
        return view('admin.stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.stations.add');
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
            "station_name" => "required"
        ]);

        try {
            Station::create($request->only("station_name"));
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Unable to create station.");
            return back();
        }
        session()->flash('success', "New Station Stored.");
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
    public function edit(Station $station)
    {
        //
        return view('admin.stations.edit_updated', compact('station'));
        return view('admin.stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //
        $request->validate([
            "station_name" => "required"
        ]);
        $station->station_name = $request->station_name;

        try {
            if ($station->isDirty("station_name")) {
                $station->save();
            }
        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error', "Unable to udpate information.");
            return back()->withInput();
        }

        session()->flash('success', "Station Information updated.");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
        try {
            $station->delete();
        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error', "Unable to remove stations.");
            return back();
        }

        session()->flash("success", "Station Removed.");
        return back();
    }
}
