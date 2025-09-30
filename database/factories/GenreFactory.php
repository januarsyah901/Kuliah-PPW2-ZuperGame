<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Genre::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar nama genre yang umum
        $genres = ['Action', 'RPG', 'Strategy', 'Adventure', 'Simulation', 'Sports', 'Puzzle'];

        // Menggunakan array statis untuk memastikan nama unik yang konsisten
        // Anda bisa memilih dari daftar ini atau menggunakan faker()->unique()->word()
        return [
            'name' => $this->faker->unique()->randomElement($genres),
        ];
    }
}
