@extends('layouts.app')

@section('title', 'Daftar Game')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Happy Di Zuper Game</h1>
        <h2 class="text-xl font-bold mb-6">{{ $developer->name }} Games</h2>
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
                                <strong>Developer:</strong>
                                <a href="{{ route('developer.show', $game->developer->id) }}" class="text-blue-500 hover:underline">
                                    {{ $game->developer->name }}
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
    </div>
@endsection
