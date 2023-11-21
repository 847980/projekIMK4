<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cinema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\City;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('cinemas')->truncate();
        // Schema::enableForeignKeyConstraints();
        $data=[
            [
                'name'=> "cinemaku",
                'address' => "jalan raya surabaya",
                'city_id' => City::where('name','surabaya')->first()->id,
            ],
            [
                'name'=> "Bukan Cinema",
                'address' => "jalan raya Jakarta",
                'city_id' => City::where('name','jakarta')->first()->id,
            ],
            [
                'name'=> "ini cinema bandung",
                'address' => "jalan raya bandung",
                'city_id' => City::where('name','bandung')->first()->id,
            ],

        ];

        foreach($data as $value){
            Cinema::create($value);
        }
    }
}
