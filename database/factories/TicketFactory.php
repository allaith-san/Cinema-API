<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Screening;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create("nl_NL");
        $status = $faker->randomElement(['Paid','Canceled']);

        return [
            'customer_id' => Customer::factory(),
            'screening_id' => Screening::all()->random()->id,
            'cost' => $faker->numberBetween(5,15),
            'status' => $status,
            'billed_date' => $faker->dateTimeThisDecade,
            'paid_date' => $status == 'Paid' ? $faker->dateTimeThisDecade : null

        ];
    }
}
