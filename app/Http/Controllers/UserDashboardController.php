<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $games = \App\Models\Game::with('developer')->latest()->get();
        $latestGames = \App\Models\Game::with('developer')->latest()->take(5)->get();
        $developers = \App\Models\Developer::all();
        return view('user_dashboard.index', compact('games', 'latestGames', 'developers'));
    }
}
