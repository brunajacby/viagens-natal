<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\DashboardController;

// rota da página inicial
Route::get('/', [TripController::class, 'allTrips'])->name('trips.all');

// rota das paragens 
Route::get('/trips/{id}/stops', [StopController::class, 'tripStops'])->name('stops.trip');

// rota do dashboard -login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// rota do formulário para adicionar viagem
Route::get('/trips/add', [TripController::class, 'addTrip'])->name('trips.add')->middleware('auth');

// rota para gravar a viagem
Route::post('/trips/store', [TripController::class, 'storeTrip'])->name('trips.store')->middleware('auth');

// rota do formulário para editar viagem
Route::get('/trips/edit/{id}', [TripController::class, 'editTrip'])->name('trips.edit')->middleware('auth');

// rota para gravar as alterações da viagem
Route::put('/trips/update', [TripController::class, 'updateTrip'])->name('trips.update')->middleware('auth');

// rota para apagar viagem
Route::get('/trips/delete/{id}', [TripController::class, 'deleteTrip'])->name('trips.delete')->middleware('auth');

// rota do formulário para adicionar paragem
Route::get('/trips/{tripId}/stops/add', [StopController::class, 'addStop'])->name('stops.add')->middleware('auth');

// rota para gravar a paragem
Route::post('/stops/store', [StopController::class, 'storeStop'])->name('stops.store')->middleware('auth');

// rota do formulário para editar paragem
Route::get('/stops/edit/{id}', [StopController::class, 'editStop'])->name('stops.edit')->middleware('auth');

// rota para gravar as alterações da paragem
Route::put('/stops/update', [StopController::class, 'updateStop'])->name('stops.update')->middleware('auth');

// rota para apagar paragem
Route::get('/stops/delete/{id}', [StopController::class, 'deleteStop'])->name('stops.delete')->middleware('auth');

// Rota de fallback
Route::fallback(function () {
    return view('utils.fallback');
});