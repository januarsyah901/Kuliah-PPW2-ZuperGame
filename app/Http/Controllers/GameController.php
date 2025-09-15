<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = \App\Models\Game::all();
        $latestGames = \App\Models\Game::latest()->take(5)->get();

        return view('games.index', compact('games', 'latestGames'));
    }

    public function stat()
    {
        $totalGames = \App\Models\Game::count();
        $averageSize = \App\Models\Game::average('size_mb');
        $genreDistribution = \App\Models\Game::select('genre', DB::raw('count(*) as count'))
            ->groupBy('genre')
            ->get();

        return view('games.stat', compact('totalGames', 'averageSize', 'genreDistribution'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

public function searchGame(Request $request)
{
    $query = trim($request->get('query', ''));

    if ($query === '') {
        $games = collect();
    } else {
        $games = \App\Models\Game::query()
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('genre', 'like', '%' . $query . '%')
            ->get();
    }

    return view('games.search', compact('games', 'query'));
}
    public function showGame($game_id)
    {
        $game = \App\Models\Game::findOrFail($game_id);

        return view('games.show', compact('game'));
    }

    public function showGenre($genre)
    {
        $games = \App\Models\Game::where('genre', $genre)->get();

        return view('games.genre', compact('games', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
