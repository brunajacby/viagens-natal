<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // mostra o dashboard
    public function index()
    {
        // hoje até meia noite
        $hoje = Carbon::today();

        // dia de Natal deste ano até meia noite
        $natal = Carbon::createMidnightDate(now()->year, 12, 25);

        // dias que faltam até ao Natal
        $diasNatal = (int) $hoje->diffInDays($natal);

        return view('dashboard.home', compact('diasNatal'));
    }
}