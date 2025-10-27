@extends('layouts.app')

@section('title', 'Edit Game')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-xl">
        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center bg-yellow-500">
                <span class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    Edit Game
                </span>
                <a href="{{ route('home') }}" class="text-sm text-gray-900 hover:underline font-semibold">Back</a>
            </div>
            <div class="px-6 py-8">
                @if ($errors->any())
                    <div class="mb-6 bg-red-600/80 text-white rounded-lg p-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('games.update', $game->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-bold mb-2 text-yellow-400">Game Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('name') border-red-500 ring-red-500 @enderror" required maxlength="255" value="{{ old('name', $game->name) }}">
                        @error('name')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="developer_id" class="block text-sm font-bold mb-2 text-yellow-400">Developer</label>
                        <select name="developer_id" id="developer_id" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('developer_id') border-red-500 ring-red-500 @enderror" required>
                            <option value="">Select a developer</option>
                            @foreach($developers as $developer)
                                <option value="{{ $developer->id }}" {{ old('developer_id', $game->developer_id ?? '') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                            @endforeach
                        </select>
                        @error('developer_id')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="size_mb" class="block text-sm font-bold mb-2 text-yellow-400">Size (MB)</label>
                        <input type="number" name="size_mb" id="size_mb" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('size_mb') border-red-500 ring-red-500 @enderror" required min="0" step="0.01" value="{{ old('size_mb', $game->size_mb) }}">
                        @error('size_mb')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold mb-2 text-yellow-400">Description</label>
                        <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('description') border-red-500 ring-red-500 @enderror">{{ old('description', $game->description) }}</textarea>
                        @error('description')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-yellow-500 text-gray-900 font-bold px-4 py-2 rounded hover:bg-yellow-400 transition">Save Changes</button>
                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-semibold">Delete</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
