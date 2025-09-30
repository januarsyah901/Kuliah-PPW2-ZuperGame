<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil genre yang sudah ada atau buat baru jika kosong
        $genre = Genre::inRandomOrder()->first() ?? Genre::factory()->create();

        // Tentukan ukuran game berdasarkan genre (lebih logis)
        $sizeByGenre = [
            'Action' => [1000, 100000],    // 1GB - 100GB
            'RPG' => [500, 80000],        // 500MB - 80GB
            'Puzzle' => [50, 5000],       // 50MB - 5GB
            'Simulation' => [200, 40000], // 200MB - 40GB
            'Sports' => [500, 20000],     // 500MB - 20GB
        ];

        $range = $sizeByGenre[$genre->name] ?? [100, 50000]; // default

        return [
            'name' => $this->faker->unique()->words(2, true) . ' ' . $this->faker->randomElement(['Saga', 'Quest', 'Legends', 'Arena']),
            'genre_id' => $genre->id,
            'size_mb' => $this->faker->numberBetween($range[0], $range[1]),
            'description' => $this->faker->paragraphs(2, true),
        ];
    }
}
