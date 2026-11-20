<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\StopController;

// rota da página inicial: mostra todas as viagens
Route::get('/', [TripController::class, 'allTrips'])->name('trips.all');

// rota das paragens de uma viagem
Route::get('/trips/{id}/stops', [StopController::class, 'tripStops'])->name('stops.trip');