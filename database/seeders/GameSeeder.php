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
        $games = [
            [
                'name' => 'The Legend of Zelda: Breath of the Wild',
                'genre' => 'Action-Adventure',
                'size_mb' => 13400,
                'description' => 'An open-world action-adventure game where players explore the kingdom of Hyrule and embark on a quest to defeat Calamity Ganon.',
            ],
            [
                'name' => 'Super Mario Odyssey',
                'genre' => 'Platformer',
                'size_mb' => 5700,
                'description' => 'A 3D platformer where Mario embarks on a globe-trotting adventure to rescue Princess Peach from Bowser.',
            ],
            [
                'name' => 'God of War',
                'genre' => 'Action',
                'size_mb' => 45000,
                'description' => 'An action-adventure game following Kratos and his son Atreus on their journey through Norse mythology.',
            ],
            [
                'name' => 'Minecraft',
                'genre' => 'Sandbox',
                'size_mb' => 1000,
                'description' => 'A sandbox game that allows players to build, explore, and survive in a blocky, procedurally generated world.',
            ],
            [
                'name' => 'Fortnite',
                'genre' => 'Battle Royale',
                'size_mb' => 26000,
                'description' => 'A free-to-play battle royale game where 100 players fight to be the last one standing.',
            ],
            [
                'name' => 'Among Us',
                'genre' => 'Social Deduction',
                'size_mb' => 250,
                'description' => 'A multiplayer game where players work together to complete tasks while trying to identify impostors among the crew.',
            ],
            [
                'name' => 'Cyberpunk 2077',
                'genre' => 'RPG',
                'size_mb' => 70000,
                'description' => 'An open-world role-playing game set in a dystopian future where players take on the role of a mercenary outlaw.',
            ],
            [
                'name' => 'Animal Crossing: New Horizons',
                'genre' => 'Simulation',
                'size_mb' => 6200,
                'description' => 'A life simulation game where players develop a deserted island into a thriving community.',
            ],
            [
                'name' => 'Call of Duty: Warzone',
                'genre' => 'First-Person Shooter',
                'size_mb' => 100000,
                'description' => 'A free-to-play battle royale game set in the Call of Duty universe.',
            ],
            [
                'name' => 'Valorant',
                'genre' => 'Tactical Shooter',
                'size_mb' => 8000,
                'description' => 'A team-based tactical shooter where players use unique agent abilities in competitive matches.',
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'genre' => 'Action-Adventure',
                'size_mb' => 150000,
                'description' => 'An epic tale of life in America’s unforgiving heartland, following outlaw Arthur Morgan and the Van der Linde gang.',
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'genre' => 'RPG',
                'size_mb' => 50000,
                'description' => 'A story-driven open-world RPG set in a fantasy universe, where you play as professional monster hunter Geralt of Rivia.',
            ],
            [
                'name' => 'Apex Legends',
                'genre' => 'Battle Royale',
                'size_mb' => 22000,
                'description' => 'A free-to-play battle royale game where legendary characters with powerful abilities team up to fight for fame and fortune on the fringes of the Frontier.',
            ],
            [
                'name' => 'Stardew Valley',
                'genre' => 'Simulation',
                'size_mb' => 500,
                'description' => 'A charming farming simulation game where you inherit your grandfather\'s old farm plot and work to restore it to its former glory.',
            ],
            [
                'name' => 'Overwatch 2',
                'genre' => 'First-Person Shooter',
                'size_mb' => 30000,
                'description' => 'A vibrant team-based shooter set in an optimistic future, where heroes from around the world clash on the battlefield.',
            ],
            [
                'name' => 'Elden Ring',
                'genre' => 'Action RPG',
                'size_mb' => 60000,
                'description' => 'A fantasy action RPG where players journey through a vast world to become the next Elden Lord.',
            ],
            [
                'name' => 'League of Legends',
                'genre' => 'MOBA',
                'size_mb' => 12000,
                'description' => 'A fast-paced, competitive multiplayer online battle arena (MOBA) game where two teams of five powerful champions clash.',
            ],
            [
                'name' => 'Terraria',
                'genre' => 'Sandbox',
                'size_mb' => 300,
                'description' => 'An action-packed adventure game where players dig, fight, and build their way through a world of enemies and treasures.',
            ],
            [
                'name' => 'Hades',
                'genre' => 'Roguelike',
                'size_mb' => 1500,
                'description' => 'A god-like roguelike dungeon crawler where you fight your way out of the Underworld and defy the god of the dead.',
            ],
            [
                'name' => 'Celeste',
                'genre' => 'Platformer',
                'size_mb' => 1200,
                'description' => 'A challenging and emotional platformer where you help Madeline survive her inner demons on a journey to the top of Celeste Mountain.',
            ],

        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}
