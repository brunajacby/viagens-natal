<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    // mostra todas as viagens
    public function allTrips() {

        // vai buscar as viagens e conta as paragens de cada uma
        $trips = Trip::withCount('stops')->get();

        // envia as viagens para a view
        return view('trips.alltrips', compact('trips'));
    }

    // mostra o formulário para adicionar viagem
    public function addTrip() {

        return view('trips.addtrip');
    }
}