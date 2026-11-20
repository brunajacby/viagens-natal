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
Route::get('/trips/add', [TripController::class, 'addTrip'])->name('trips.add');