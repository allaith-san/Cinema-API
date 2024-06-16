<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomerFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        $faker = \Faker\Factory::create("nl_NL");

        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'address' => $faker->address,
            'city' => $faker->city,
            'zipcode' => $faker->postcode,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
