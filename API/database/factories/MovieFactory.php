<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MovieFactory extends Factory
{

    public function definition(): array
    {
        $movieFaker = \Faker\Factory::create();
        $movieFaker->addProvider(new \Xylis\FakerCinema\Provider\Movie($movieFaker));

        $personFaker = \Faker\Factory::create();
        $personFaker->addProvider(new \Xylis\FakerCinema\Provider\Person($personFaker));
        
        return [
            'name' => $movieFaker->movie,
            'genre' => $movieFaker->movieGenre,
            'runtime' => $movieFaker->runtime,
            'studio' => $movieFaker->studio,
            'lead_actor' => $personFaker->actor,
            'director' => $personFaker->director,

        ];
    }



}
