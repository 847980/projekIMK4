<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailTransaction;
use App\Models\Film;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ShowTime;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\ShowSeat;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('detail_transactions')->truncate();
        // Schema::enableForeignKeyConstraints();
        $data = [
            [
                'transaction_id' => Transaction::where('user_id', User::where('username', 'user')->first()->id)->first()->id,
                'showseat_id' => ShowSeat::where(
                    'showtime_id', ShowTime::where('studio_id', Studio::where('name','studio1')->first()->id)
                    ->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)
                    ->where('film_id', Film::where('judul', 'film1')->first()->id)
                    ->where('show_date', '2024-01-01')
                    ->where('start_time', '10:00:00')
                    ->first()->id
                    )
                ->where('chair_number', 1)->first()->id
            ],
            [
                'transaction_id' => Transaction::where('user_id', User::where('username', 'user')->first()->id)->first()->id,
                'showseat_id' => ShowSeat::where(
                    'showtime_id', ShowTime::where('studio_id', Studio::where('name','studio1')->first()->id)
                    ->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)
                    ->where('film_id', Film::where('judul', 'film1')->first()->id)
                    ->where('show_date', '2024-01-01')
                    ->where('start_time', '10:00:00')
                    ->first()->id
                    )
                ->where('chair_number', 2)->first()->id
            ],
            [
                'transaction_id' => Transaction::where('user_id', User::where('username', 'user')->first()->id)->first()->id,
                'showseat_id' => ShowSeat::where(
                    'showtime_id', ShowTime::where('studio_id', Studio::where('name','studio1')->first()->id)
                    ->where('cinema_id',Cinema::where('name','cinemaku')->first()->id)
                    ->where('film_id', Film::where('judul', 'film1')->first()->id)
                    ->where('show_date', '2024-01-01')
                    ->where('start_time', '10:00:00')
                    ->first()->id
                    )
                ->where('chair_number', 3)->first()->id
            ],
            ];

        foreach ($data as $value) {
            DetailTransaction::create($value);
        }

    }
}
