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
        $games = \App\Models\Game::with('genres')->get();
        $latestGames = \App\Models\Game::with('genres')->latest()->take(5)->get();
        $genres = \App\Models\Genre::all();
        return view('games.index', compact('games', 'latestGames', 'genres'));
    }

    public function stat()
    {
        $totalGames = \App\Models\Game::count();
        $averageSize = \App\Models\Game::average('size_mb');
        $genreDistribution = \App\Models\Genre::withCount('games')->get();
        return view('games.stat', compact('totalGames', 'averageSize', 'genreDistribution'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = \App\Models\Genre::all();
        return view('games.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,id',
            'size_mb' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $game = \App\Models\Game::create([
            'name' => $validated['name'],
            'size_mb' => $validated['size_mb'],
            'description' => $validated['description'] ?? null,
        ]);
        $game->genres()->attach($validated['genres']);
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
        $games = \App\Models\Game::with('genres')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhereHas('genres', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();
    }

//    dd($games);
    return view('games.search', compact('games', 'query'));
}
    public function showGame($game_id)
    {
        $game = \App\Models\Game::with('genres')->findOrFail($game_id);

//        @dd($game->genres);

        return view('games.show', compact('game'));
    }

    public function showGenre($genre_id)
    {
        $genre = \App\Models\Genre::findOrFail($genre_id);
        $games = $genre->games()->with('genres')->get();

        return view('games.genre', compact('games', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $game = \App\Models\Game::with('genres')->findOrFail($id);
        $genres = \App\Models\Genre::all();
        return view('games.edit', compact('game', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size_mb' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);
        $game = \App\Models\Game::findOrFail($id);
        $game->update([
            'name' => $validated['name'],
            'size_mb' => $validated['size_mb'],
            'description' => $validated['description'] ?? null,
        ]);
        $game->genres()->sync($validated['genres']);
        return redirect()->route('games.show', $game->id)->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $game = \App\Models\Game::findOrFail($id);
        $game->genres()->detach();
        $game->delete();
        return redirect()->route('home')->with('success', 'Game deleted successfully!');
    }
}
