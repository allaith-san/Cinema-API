<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Screening;
use App\Models\Movie;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);
        
        $this->call([
            MovieSeeder::class,
            TheaterSeeder::class,
            ScreeningSeeder::class,
            CustomerSeeder::class,
        ]);

        $this->updateSeats();

    }

    public function updateSeats(){

        $tickets = Ticket::where('status','Paid')->get();
        $screenings = [];
        for ($i=0; $i < count($tickets); $i++) { 
            $screenings[$i] = Screening::find($tickets[$i]->screening_id);
            $screenings[$i]->reserved_seats += 1;
            $screenings[$i]->remaining_seats -= 1;
            $screenings[$i]->save();
        }
    }
}
