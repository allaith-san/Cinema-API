<?php

namespace Database\Factories;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'theater_id' => Theater::factory(),
            'name' => "Hall" . " " . $faker->unique()->randomElement(['A','B','C','D','E','F','G','H','I','J','K','L']) . $faker->unique()->numberBetween(1,10),
            'max_seats_amount' => $faker->randomElement([25,50,75,100,150])
        ];
    }
}
