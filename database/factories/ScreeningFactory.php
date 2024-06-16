<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Screening>
 */
class ScreeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $hall = Hall::all()->random();

        return [
            'movie_id' => Movie::factory(),
            'showtime' => now(),
            'hall_id' => $hall->id,
            'reserved_seats' => 0,
            "remaining_seats" => $hall->max_seats_amount,
        ];
    }
}
