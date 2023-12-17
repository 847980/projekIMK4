<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShowTime;
use App\Models\Studio;
use App\Models\Cinema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('show_times')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data=[
                [
                    'film_id' => Film::where('judul','film1')->first()->id,
                    'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                    'studio_id' => Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id,
                    'show_date' => '2024-01-01',
                    'start_time' => '10:00:00',
                    'end_time' => '12:00:00',
                    'price' => 10000,

                ]
            ];

        foreach($data as $value){
            ShowTime::create($value);
            
            
        }
    }
}
