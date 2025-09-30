<?php

// database/seeders/GenreSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'RPG'],
            ['name' => 'Strategy'],
            ['name' => 'Adventure'],
            ['name' => 'Simulation'],
            ['name' => 'Sports'],
            ['name' => 'Puzzle'],
            ['name' => 'Horror'],
        ];

        foreach ($genres as $genre) {
            // Menggunakan firstOrCreate untuk menghindari duplikasi
            Genre::firstOrCreate($genre);
        }
    }
}
