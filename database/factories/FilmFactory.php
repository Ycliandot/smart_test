<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(random_int(1, 3)),
            'is_published'=> 0,
            'url_poster' => $this->faker->imageUrl,
        ];
    }
}
