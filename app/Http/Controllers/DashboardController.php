<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // mostra o dashboard
    public function index()
    {
        return view('dashboard.home');
    }
}