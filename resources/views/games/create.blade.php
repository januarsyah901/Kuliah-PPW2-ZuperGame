@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-xl">
        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center bg-yellow-500">
                <span class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    Add New Game
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
                <form action="{{ route('games.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-bold mb-2 text-yellow-400">Game Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('name') border-red-500 ring-red-500 @enderror" required maxlength="255" value="{{ old('name') }}">
                        @error('name')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="genres" class="block text-sm font-bold mb-2 text-yellow-400">Genres</label>
                        <select name="genres[]" id="genres" multiple class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('genres') border-red-500 ring-red-500 @enderror" required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ (collect(old('genres'))->contains($genre->id)) ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        @error('genres')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="size_mb" class="block text-sm font-bold mb-2 text-yellow-400">Size (MB)</label>
                        <input type="number" name="size_mb" id="size_mb" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('size_mb') border-red-500 ring-red-500 @enderror" required min="0" step="0.01" value="{{ old('size_mb') }}">
                        @error('size_mb')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-bold mb-2 text-yellow-400">Description</label>
                        <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('description') border-red-500 ring-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="w-full py-3 rounded-lg bg-yellow-500 text-gray-900 font-bold text-lg shadow hover:bg-yellow-400 transition">Create Game</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
