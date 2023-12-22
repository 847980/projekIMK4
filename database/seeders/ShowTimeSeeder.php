<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShowTime;
use App\Models\Studio;
use App\Models\Cinema;
use App\Models\ShowSeat;
use Carbon\Carbon;
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
        $date = Carbon::now()->addDays(2)->format('Y-m-d');
        $data2=[
                [
                    'film_id' => Film::where('judul','film1')->first()->id,
                    'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                    'studio_id' => Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id,
                    'show_date' => '2023-12-18',
                    'start_time' => '10:00:00',
                    'end_time' => '12:00:00',
                    'price' => 10000,
                ],
                [
                    'film_id' => Film::where('judul','film1')->first()->id,
                    'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                    'studio_id' => Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id,
                    'show_date' => '2023-12-18',
                    'start_time' => '13:00:00',
                    'end_time' => '15:00:00',
                    'price' => 10000,
                ],

                [
                    'film_id' => Film::where('judul','film1')->first()->id,
                    'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                    'studio_id' => Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id,
                    'show_date' => "$date",
                    'start_time' => '16:00:00',
                    'end_time' => '18:00:00',
                    'price' => 10000,
                ]
            ];
            foreach($data2 as $value){
                $newshowtime = ShowTime::create($value);
                // get last insert id
                $seat = [
                    'showtime_id' => $newshowtime->id,
                    'chair_number' => 1,
                    'chair_status' => 0,
                ];
                // membuat seat untuk setiap showtime
                for($i=1;$i<=144;$i++){
                    if($i==1 || $i==2 || $i==3){
                        $seat['chair_status']= 1;
                    }
                    else{
                        $seat['chair_status']= 0;
                    }
                    ShowSeat::create($seat);
                    $seat['chair_number']++;
                }
            };

            $data = [];
            $date = Carbon::now()->format('Y-m-d');
            for($i = 0; $i < 7; $i++){
                $data[$i]['film_id'] = Film::where('judul','film1')->first()->id;
                $data[$i]['cinema_id'] = Cinema::where('name','cinemaku')->first()->id;
                $data[$i]['studio_id'] = Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id;
                $data[$i]['show_date'] = $date;
                $data[$i]['start_time'] = '10:00:00';
                $data[$i]['end_time'] = '12:00:00';
                $data[$i]['price'] = 10000;
                $date = Carbon::parse($date)->addDays(1)->format('Y-m-d');
            }

            $date = Carbon::now()->format('Y-m-d');
            for($i = 7; $i < 14; $i++){
                $data[$i]['film_id'] = Film::where('judul','film2')->first()->id;
                $data[$i]['cinema_id'] = Cinema::where('name','cinemaku')->first()->id;
                $data[$i]['studio_id'] = Studio::where('name','studio1')->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)->first()->id;
                $data[$i]['show_date'] = $date;
                $data[$i]['start_time'] = '12:00:00';
                $data[$i]['end_time'] = '14:00:00';
                $data[$i]['price'] = 10000;
                $date = Carbon::parse($date)->addDays(1)->format('Y-m-d');
            }

            $date = Carbon::now()->format('Y-m-d');
            for($i = 14; $i < 21; $i++){
                $data[$i]['film_id'] = Film::where('judul','film2')->first()->id;
                $data[$i]['cinema_id'] = Cinema::where('name','Bukan cinemaku')->first()->id;
                $data[$i]['studio_id'] = Studio::where('name','studio3')->where('cinema_id',Cinema::where('name','Bukan cinemaku')->first()->id)->first()->id;
                $data[$i]['show_date'] = $date;
                $data[$i]['start_time'] = '08:00:00';
                $data[$i]['end_time'] = '10:00:00';
                $data[$i]['price'] = 10000;
                $date = Carbon::parse($date)->addDays(1)->format('Y-m-d');
            }



        foreach($data as $value){
            $newshowtime = ShowTime::create($value);
            // get last insert id
            $seat = [
                'showtime_id' => $newshowtime->id,
                'chair_number' => 1,
                'chair_status' => 0,
            ];
            // membuat seat untuk setiap showtime
            for($i=1;$i<=144;$i++){
                ShowSeat::create($seat);
                $seat['chair_number']++;
            }
        }
    }
}
