<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    // mostra o formulário para adicionar paragem
    public function addStop($tripId) {

        $trip = Trip::where('id', $tripId)->first();

        return view('stops.addstop', compact('trip'));
    }

    // grava a paragem nova
    public function storeStop(Request $request) {

        $request->validate([
            'city' => 'required|max:100',
            'visit_date' => 'required|date',
            'photo' => 'image'
        ]);

        $photo = null;

        if($request->hasFile('photo')){
            //armazenar no storage e guarda o caminho numa var
            $photo = Storage::putFile('stopPhotos', $request->photo);
        }

        Stop::insert([
            'city' => $request->city,
            'visit_date' => $request->visit_date,
            'photo' => $photo,
            'trip_id' => $request->trip_id
        ]);

        return redirect()->route('stops.trip', $request->trip_id)->with('message', 'Paragem adicionada com sucesso!');
    }

        // mostra o formulário para editar paragem
    public function editStop(int $id) {

        $stopInfo = Stop::where('id', $id)->select('id', 'city', 'visit_date', 'photo', 'trip_id')->first();

        return view('stops.editstop', compact('stopInfo'));
    }

        // grava as alterações da paragem
    public function updateStop(Request $request) {

        $request->validate([
            'city' => 'required|max:100',
            'visit_date' => 'required|date',
            'photo' => 'image'
        ]);

        $photo = Stop::where('id', $request->id)->value('photo');

        if($request->hasFile('photo')){
            //armazenar no storage e guarda o caminho numa var
            $photo = Storage::putFile('stopPhotos', $request->photo);
        }

        Stop::where('id', $request->id)->update([
            'city' => $request->city,
            'visit_date' => $request->visit_date,
            'photo' => $photo
        ]);

        return redirect()->route('stops.trip', $request->trip_id)->with('message', 'Paragem actualizada com sucesso!');
    }

    // apaga a paragem
    public function deleteStop($id) {

        Stop::where('id', $id)->delete();

        return back();
    }
}