<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 20 data game dummy
        $gamesData = [
            [
                'name' => 'Action Hero',
                'size_mb' => 15000,
                'description' => 'Fast-paced action game with stunning graphics.'
            ],
            [
                'name' => 'RPG Legends',
                'size_mb' => 22000,
                'description' => 'Epic RPG adventure with deep story.'
            ],
            [
                'name' => 'Strategy Master',
                'size_mb' => 8000,
                'description' => 'Test your mind in this strategy game.'
            ],
            [
                'name' => 'Adventure Island',
                'size_mb' => 12000,
                'description' => 'Explore mysterious islands and solve puzzles.'
            ],
            [
                'name' => 'Sim Builder',
                'size_mb' => 18000,
                'description' => 'Build and manage your own city.'
            ],
            [
                'name' => 'Sports Mania',
                'size_mb' => 9000,
                'description' => 'Compete in various sports tournaments.'
            ],
            [
                'name' => 'Puzzle Quest',
                'size_mb' => 4000,
                'description' => 'Solve challenging puzzles and riddles.'
            ],
            [
                'name' => 'Horror Night',
                'size_mb' => 16000,
                'description' => 'Survive the night in a haunted mansion.'
            ],
            [
                'name' => 'Action Arena',
                'size_mb' => 14000,
                'description' => 'Battle against other players in the arena.'
            ],
            [
                'name' => 'RPG Kingdom',
                'size_mb' => 21000,
                'description' => 'Rule your own kingdom in this RPG.'
            ],
            [
                'name' => 'Strategy War',
                'size_mb' => 10000,
                'description' => 'Lead your army to victory.'
            ],
            [
                'name' => 'Adventure Cave',
                'size_mb' => 11000,
                'description' => 'Discover secrets in the deep caves.'
            ],
            [
                'name' => 'Sim Life',
                'size_mb' => 17000,
                'description' => 'Live your dream life in this simulation.'
            ],
            [
                'name' => 'Sports Pro',
                'size_mb' => 9500,
                'description' => 'Become a sports legend.'
            ],
            [
                'name' => 'Puzzle World',
                'size_mb' => 4200,
                'description' => 'A world full of puzzles.'
            ],
            [
                'name' => 'Horror Escape',
                'size_mb' => 15500,
                'description' => 'Escape from terrifying creatures.'
            ],
            [
                'name' => 'Action Strike',
                'size_mb' => 13000,
                'description' => 'Strike fast and win.'
            ],
            [
                'name' => 'RPG Saga',
                'size_mb' => 20000,
                'description' => 'Embark on a saga of heroes.'
            ],
            [
                'name' => 'Strategy Empire',
                'size_mb' => 9500,
                'description' => 'Build your empire and conquer.'
            ],
            [
                'name' => 'Adventure Forest',
                'size_mb' => 11500,
                'description' => 'Adventure in the mysterious forest.'
            ],
        ];
        $genreIds = \App\Models\Genre::pluck('id')->toArray();
        foreach ($gamesData as $data) {
            $game = \App\Models\Game::create($data);
            // Attach 1-3 random genres to each game
            $game->genres()->attach(\Illuminate\Support\Arr::random($genreIds, rand(1, 3)));
        }
    }
}
