<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Stop;

class StopController extends Controller
{
    //mostra as paragens de uma viagem
    public function tripStops($id) {

        //buscar a viagem
        $trip = Trip::where('id', $id)->first();

        //buscar as paragens dessa viagem
        $stops = Stop::where('trip_id', $id)->get();

        return view('stops.tripstops', compact('trip', 'stops'));
    }
}