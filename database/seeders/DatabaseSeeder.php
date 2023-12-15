<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Admin;
use App\Models\Film;
use App\Models\ShowTime;
use Illuminate\Database\Seeder;
// bycrpt
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678')
            ];

            User::create($data);

           $this->call([
                AdminSeeder::class,
                GenreSeeder::class,
                CountrySeeder::class,
                CitySeeder::class,
                CinemaSeeder::class,
                StudioSeeder::class,
                FilmSeeder::class,
                ShowTimeSeeder::class,
                ShowSeatSeeder::class,
                TransactionSeeder::class,
                DetailTransactionSeeder::class,
                
           ]);

            
    }
}
