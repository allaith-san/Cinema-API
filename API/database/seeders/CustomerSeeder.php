<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(100)->hasTickets(1)->create();
        Customer::factory()->count(100)->hasTickets(2)->create();
        Customer::factory()->count(100)->create();
    }
}
