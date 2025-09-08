@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center py-20">
        <h1 class="text-4xl font-bold"> Welcome to Zuper Game </h1>
        <p class="mt-4">Nikmati berbagai permainan casino online versi demo!</p>
        <a href="{{ route('games.index') }}"
           class="mt-6 inline-block bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400">
            Lihat Game
        </a>
    </div>
@endsection
