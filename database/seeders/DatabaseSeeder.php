<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Film::factory(20)->create();
        Genre::factory(10)->create();
        FilmGenre::factory(20)->create();
    }
}
