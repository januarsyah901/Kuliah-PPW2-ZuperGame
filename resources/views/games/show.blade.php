@extends('layouts.app')

@section('title', $game)

@section('content')
    <div class="container">
        <h1>Games Library</h1>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-xl font-bold mb-2 text-blue-600 hover:text-blue-800">
                        {{ $game->name }}
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
    </div>
@endsection
