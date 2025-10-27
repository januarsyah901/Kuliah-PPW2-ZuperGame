<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            ['name' => 'Ubisoft'],
            ['name' => 'Electronic Arts'],
            ['name' => 'Valve'],
            ['name' => 'Rockstar Games'],
            ['name' => 'Bethesda'],
            ['name' => 'Square Enix'],
            ['name' => 'Capcom'],
            ['name' => 'Nintendo'],
        ];
        foreach ($developers as $dev) {
            Developer::firstOrCreate($dev);
        }
    }
}

