@extends('layouts.app')

@section('title', 'Daftar Game')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Happy Di Zuper Game</h1>

        <ul class="space-y-4">
            <li>
                <a href="{{ route('games.show', 'spaceman') }}" class="block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                    🚀 Spaceman
                </a>
            </li>
            <li>
                <a href="{{ route('games.show', 'magic Wheel') }}" class="block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                    🐳 Magic Wheel
                </a>
            </li>
            <li>
                <a href="{{ route('games.show', 'poker') }}" class="block p-4 bg-white text-gray-900 shadow hover:bg-gray-200 rounded">
                    ♠️ Poker
                </a>
            </li>
        </ul>
    </div>
@endsection
