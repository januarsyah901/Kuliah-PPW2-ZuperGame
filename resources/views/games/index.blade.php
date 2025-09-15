@extends('layouts.app')
@section('title', 'Daftar Game')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Happy Di Zuper Game</h1>
        <div class="mb-8">
            <form method="GET" action="{{ route('search.game') }}" class="flex gap-4">
                <input type="text"
                       name="query"
                       placeholder="Search games by name or genre..."
                       class="flex-1 px-4 py-2 border bg-gray-900 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </form>
        </div>
        <!-- Dropdown Genres -->
        <div class="relative">
            <button id="genreDropdownBtn" type="button" class="hover:underline focus:outline-none">
                Genres
                <svg class="inline w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="genreDropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg">
                @foreach($genres as $genre)
                    <a href="{{ route('genre.show', $genre) }}"
                       class="block px-4 py-2 hover:bg-yellow-100">
                        {{ $genre }}
                    </a>
                @endforeach
            </div>
        </div>
        @if(isset($latestGames) && $latestGames->count() > 0)
        <h2>Recent added</h2>
        <div class="space-y-4 mb-8">
                @foreach($latestGames as $game)
                    <a href="{{ route('games.show', $game->id) }}"
                       class="inline-block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                        {{ $game->name }}
                    </a>
                @endforeach
        </div>
        @endif
        <h2>All of games</h2>
        <div class="space-y-4">
            @foreach($games as $game)
                <a href="{{ route('games.show', $game->id) }}"
                   class="inline-block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                    {{ $game->name }}
                </a>
            @endforeach
        </div>
    </div>
    <script>
        // Dropdown genre toggle
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('genreDropdownBtn');
            const menu = document.getElementById('genreDropdownMenu');
            document.addEventListener('click', function (e) {
                if (btn.contains(e.target)) {
                    menu.classList.toggle('hidden');
                } else if (!menu.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
