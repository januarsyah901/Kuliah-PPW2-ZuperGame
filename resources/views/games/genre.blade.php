@extends('layouts.app')

@section('title', 'Daftar Game')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Happy Di Zuper Game</h1>
        <h2>{{ $genre->name }} Games</h2>
        <div class="space-y-4">
            @foreach($games as $game)
                <a href="{{ route('games.show', $game->id) }}"
                   class="inline-block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                    {{ $game->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
