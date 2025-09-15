@extends('layouts.app')

@section('title', 'Game Statistics')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Game Statistics</h1>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body text-center bg bg-gray-800">
                                <h5 class="card-title">Total Games</h5>
                                <h2 class="text-primary">{{ $totalGames }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body text-center bg-gray-800">
                                <h5 class="card-title">Average Size</h5>
                                <h2 class="text-success">{{ number_format($averageSize, 2) }} MB</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="card-body text-center bg-gray-800">
                                <h5 class="card-title">Total Genres</h5>
                                <h2 class="text-info">{{ $genreDistribution->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Genre Distribution</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Genre</th>
                                            <th>Number of Games</th>
                                            <th>Percentage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($genreDistribution as $genre)
                                            <tr>
                                                <td class="p-3">{{ $genre->genre }}</td>
                                                <td class="p-3">{{ $genre->count }}</td>
                                                <td class="p-3">{{ number_format(($genre->count / $totalGames) * 100, 1) }}
                                                    %
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
