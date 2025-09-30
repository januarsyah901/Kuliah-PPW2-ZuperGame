@extends('layouts.app')

@section('title', 'Game Statistics')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-8 text-center text-yellow-500">Game Statistics</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <div class="space-y-6">
                    <div class="bg-gray-800 rounded-lg shadow p-6 text-center">
                        <h5 class="text-lg font-semibold text-gray-300 mb-2">Total Games</h5>
                        <h2 class="text-3xl font-bold text-yellow-400">{{ $totalGames }}</h2>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow p-6 text-center">
                        <h5 class="text-lg font-semibold text-gray-300 mb-2">Average Size</h5>
                        <h2 class="text-3xl font-bold text-green-400">{{ number_format($averageSize, 2) }} MB</h2>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow p-6 text-center">
                        <h5 class="text-lg font-semibold text-gray-300 mb-2">Total Genres</h5>
                        <h2 class="text-3xl font-bold text-blue-400">{{ $genreDistribution->count() }}</h2>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-gray-800 rounded-lg shadow">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h5 class="text-lg font-bold text-yellow-400">Genre Distribution</h5>
                    </div>
                    <div class="p-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-300">Genre</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-300">Number of Games</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-300">Percentage</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach($genreDistribution as $genre)
                                    <tr>
                                        <td class="px-4 py-2 text-gray-200">{{ $genre->name }}</td>
                                        <td class="px-4 py-2 text-yellow-300 font-bold">{{ $genre->games_count }}</td>
                                        <td class="px-4 py-2 text-green-300 font-bold">{{ $totalGames > 0 ? number_format(($genre->games_count / $totalGames) * 100, 1) : 0 }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
