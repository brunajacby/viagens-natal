<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // mostra o dashboard
    public function index()
    {
        // dia de Natal deste ano
        $natal = Carbon::create(now()->year, 12, 25);

        // dias que faltam até ao Natal
        $diasNatal = (int) now()->startOfDay()->diffInDays($natal);

        return view('dashboard.home', compact('diasNatal'));
    }
}