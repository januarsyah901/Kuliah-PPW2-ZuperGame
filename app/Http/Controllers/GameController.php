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
        $games = \App\Models\Game::with('developer')->latest()->get();
        $latestGames = \App\Models\Game::with('developer')->latest()->take(5)->get();
        $developers = \App\Models\Developer::all();
        return view('games.index', compact('games', 'latestGames', 'developers'));
    }

    public function stat()
    {
        $totalGames = \App\Models\Game::count();
        $averageSize = \App\Models\Game::average('size_mb');
        $developerDistribution = \App\Models\Developer::withCount('games')->get();
        return view('games.stat', compact('totalGames', 'averageSize', 'developerDistribution'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = \App\Models\Developer::all();
        return view('user_dashboard.create', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'developer_id' => 'required|exists:developers,id',
            'size_mb' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $game = \App\Models\Game::create($validated);
        return redirect()->route('home')->with('success', 'Game added successfully!');
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
        $games = \App\Models\Game::with('developer')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhereHas('developer', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();
    }

//    dd($games);
    return view('games.search', compact('games', 'query'));
}
    public function showGame($game_id)
    {
        $game = \App\Models\Game::with('developer')->findOrFail($game_id);
        return view('games.show', compact('game'));
    }

    public function showDeveloper($developer_id)
    {
        $developer = \App\Models\Developer::findOrFail($developer_id);
        $games = $developer->games()->with('developer')->get();
        return view('games.developer', compact('games', 'developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $game = \App\Models\Game::with('developer')->findOrFail($id);
        $developers = \App\Models\Developer::all();
        return view('user_dashboard.edit', compact('game', 'developers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'developer_id' => 'required|exists:developers,id',
            'size_mb' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $game = \App\Models\Game::findOrFail($id);
        $game->update($validated);
        return redirect()->route('games.show', $game->id)->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $game = \App\Models\Game::findOrFail($id);
        $game->delete();
        return redirect()->route('user.dashboard')->with('success', 'Game deleted successfully!');
    }
}
