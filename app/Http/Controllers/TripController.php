<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    // grava a viagem nova
    public function storeTrip(Request $request) {

        $request->validate([
            'destination' => 'required|max:100',
            'photo' => 'image'
        ]);

        $photo = null;

        if($request->hasFile('photo')){
            //armazenar no storage e guarda o caminho numa var
            $photo = Storage::putFile('tripPhotos', $request->photo);
        }

        Trip::insert([
            'destination' => $request->destination,
            'photo' => $photo
        ]);

        return redirect()->route('trips.all')->with('message', 'Viagem adicionada com sucesso!');
    }
}