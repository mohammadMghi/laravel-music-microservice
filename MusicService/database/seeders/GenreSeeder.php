<?php

namespace Database\Seeders;

use App\Models\Genre;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $genres = [
            'Rock', 'Pop', 'Jazz', 'Hip Hop', 'Electronic',
            'Classical', 'Blues', 'Reggae', 'Country', 'Folk',
            'R&B', 'Soul', 'Metal', 'Indie'
        ]; 

        foreach ($genres as $genreName) {
            Genre::create([
                'name' => $genreName, 
            ]);
        }

        $this->command->info('Seeded ' . count($genres) . ' fake genre records.');
    }
}
