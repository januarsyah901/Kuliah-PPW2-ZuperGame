@extends('layouts.app')

@section('title', $game->name)

@section('content')
    <div class="container mx-auto">
        <h1>Games Library</h1>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-xl font-bold mb-2 text-blue-600 hover:text-blue-800">
                        {{ $game->name }}
                    </h3>
                    <p class="text-gray-600 mb-2">
                        <strong>Genre:</strong>
                        @foreach($game->genres as $genre)
                            <a href="{{ route('genre.show', $genre->id) }}"
                               class="text-blue-500 hover:underline">
                                {{ $genre->name }}
                            </a>
                        @endforeach
                    </p>
                    <p class="text-gray-600 mb-2">
                        <strong>Size:</strong> {{ number_format($game->size_mb) }} MB
                    </p>
                    @if($game->description)
                        <p class="text-gray-700">{{ Str::limit($game->description, 150) }}</p>
                    @endif
                </div>
            </div>
            <div class="flex justify-end space-x-2 mt-4">
                <a href="{{ route('games.edit', $game->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 font-semibold">Edit</a>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-semibold">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
