<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShowTime;
use App\Models\Film;
use App\Models\ShowSeat;

class ShowSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('show_seats')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data=[
            [
                'showtime_id' => ShowTime::where('film_id',Film::where('judul','film1')->first()->id)
                ->where('show_date','2023-12-18')
                ->where('start_time','10:00:00')
                ->where('end_time','12:00:00')
                ->first()->id,
                'chair_number' => 1,
                'chair_status' => 0,
            ],
            [
                'showtime_id' => ShowTime::where('film_id',Film::where('judul','film1')->first()->id)
                ->where('show_date','2023-12-18')
                ->where('start_time','13:00:00')
                ->where('end_time','15:00:00')
                ->first()->id,
                'chair_number' => 1,
                'chair_status' => 0,
            ]
        ];

    foreach($data as $value){
        for($i=1;$i<=144;$i++){
            if($i==1 || $i==2 || $i==3){
                $value['chair_status']= 1;
            }
            else{
                $value['chair_status']= 0;
            }
            ShowSeat::create($value);
            $value['chair_number']++;
        }
        
    }
    }
}
