<?php

namespace Database\Seeders;

use App\Models\Artist;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $numberOfArtists = 20;  

        for ($i = 0; $i < $numberOfArtists; $i++) {
            Artist::create([
                'name' => $faker->name(), 
            ]);
        }

        $this->command->info('Seeded ' . $numberOfArtists . ' fake artist records.');
    }
}
