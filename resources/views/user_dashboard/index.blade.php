@extends('layouts.app')
@section('title', 'Daftar Game')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Dashboard</h1>

        {{-- Flash messages (moved to partial) --}}
        @include('partials.flash')

        <div class="mb-8">
            <form method="GET" action="{{ route('search.game') }}" class="flex gap-4">
                <input type="text"
                       name="query"
                       placeholder="Search games by name or developer..."
                       class="flex-1 px-4 py-2 border bg-gray-900 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </form>
        </div>
        <!-- Dropdown By :  -->
        <div class="relative">
            <button id="developerDropdownBtn" type="button" class="hover:underline focus:outline-none">
                Developer
                <svg class="inline w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="developerDropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg">
                @foreach($developers as $developer)
                    <a href="{{ route('developer.show', $developer->id) }}"
                       class="block px-4 py-2 hover:bg-yellow-100">
                        {{ $developer->name }}
                    </a>
                @endforeach
            </div>
        </div>
        @if(isset($latestGames) && $latestGames->count() > 0)

            <!-- Recent added -->
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

        <!-- All Game -->
        <h2>All of games</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Size (MB)</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Developer</th>
                    <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            <a href="{{ route('games.show', $game->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">
                                {{ $game->name }}
                            </a>
                        </td>
                        <td class="px-4 text-blue-600 py-2">{{ $game->size_mb }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('developer.show', $game->developer->id) }}" class="text-blue-500 hover:underline">
                                {{ $game->developer->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2 text-right">
                            <a href="{{ route('games.edit', $game->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 font-semibold mr-2">Edit</a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Dropdown developer toggle
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('developerDropdownBtn');
            const menu = document.getElementById('developerDropdownMenu');
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
