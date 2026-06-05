<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Genre;
use App\Models\Music; 
use Illuminate\Database\Seeder;
use Faker\Factory;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
 
        $artists = Artist::pluck('id')->toArray();
        $genres = Genre::pluck('id')->toArray();
 
        if (empty($artists) || empty($genres)) {
            $this->command->info('Please create some artists and genres first before seeding music.');
            return;
        }

        $numberOfSongs = 50;  

        for ($i = 0; $i < $numberOfSongs; $i++) {
            Music::create([
                'title' => $faker->sentence(3, true),  
                'description' => $faker->realText(100, 2),  
                'path' => 'path/to/music/' . $faker->slug . '.mp3', 
                'lyric' => $faker->paragraphs(5, true),  
                'cover' => 'path/to/covers/' . $faker->slug . '.jpg',  
                'released_at' => $faker->dateTimeBetween('-5 years', 'now'), 
                'active' => $faker->boolean(80),  
                'artist_id' => $faker->randomElement($artists),  
                'genre_id' => $faker->randomElement($genres), 
            ]);
        }

        $this->command->info('Seeded ' . $numberOfSongs . ' fake music records.');
    }
}