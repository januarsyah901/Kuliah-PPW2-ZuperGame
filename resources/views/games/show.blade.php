@extends('layouts.app')

@section('title', $game)

@section('content')
    <div class="max-w-2xl mx-auto text-center">
        <h1 class="text-4xl font-bold">{{ $game }}</h1>
        <p class="mt-4 text-lg">Permainan {{ $game }} di Zuper Game.</p>

        <a href="{{ route('games.index') }}"
           class="mt-6 inline-block bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400">
            🔙 Kembali ke Daftar Game
        </a>
    </div>
@endsection
