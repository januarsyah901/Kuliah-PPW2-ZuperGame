@extends('layouts.app')

@section('title', 'Search Games')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Search Games</h1>

        <!-- Search Form -->
        <div class="mb-8">
            <form method="GET" action="{{ route('search.game') }}" class="flex gap-4">
                <input type="text"
                       name="query"
                       value="{{ $query }}"
                       placeholder="Search games by name or genre..."
                       class="flex-1 px-4 py-2 border bg-gray-900 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </form>
        </div>

        <!-- Search Results -->
        @if($query)
            <div class="mb-4">
                <h2 class="text-xl font-semibold">
                    Search results for: "<span class="text-blue-600">{{ $query }}</span>"
                </h2>
                <p class="text-gray-600">Found {{ $games->count() }} game(s)</p>
            </div>
        @endif

        @if($games->count() > 0)
            <div class="space-y-4">
                @foreach($games as $game)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2">
                                    <a href="{{ route('games.show', $game->id) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        {{ $game->name }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-2">
                                    <strong>Genre:</strong>
                                    <a href="{{ route('genre.show', $game->genre) }}"
                                       class="text-blue-500 hover:underline">
                                        {{ $game->genre }}
                                    </a>
                                </p>
                                <p class="text-gray-600 mb-2">
                                    <strong>Size:</strong> {{ number_format($game->size_mb) }} MB
                                </p>
                                @if($game->description)
                                    <p class="text-gray-700">{{ Str::limit($game->description, 150) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($query)
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg">No games found matching your search.</p>
                <p class="text-gray-500 mt-2">Try different keywords or browse all games.</p>
                <a href="{{ route('home') }}"
                   class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Browse All Games
                </a>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg">Enter a search term to find games.</p>
                <p class="text-gray-500 mt-2">You can search by game name, genre, or description.</p>
            </div>
        @endif
    </div>
@endsection
