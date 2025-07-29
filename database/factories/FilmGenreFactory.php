<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'film_id' => Film::all()->pluck('id')->toArray()[array_rand(Film::all()->pluck('id')->toArray(), 1)],
            'genre_id' => Genre::all()->pluck('id')->toArray()[array_rand(Genre::all()->pluck('id')->toArray(), 1)],
        ];
    }
}
