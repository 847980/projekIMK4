<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('studios')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data=[
            [
                'name' => 'studio1',
                'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                'total_chair' => 144,
            ],
            [
                'name' => 'studio2',
                'cinema_id' => Cinema::where('name','cinemaku')->first()->id,
                'total_chair' => 144,

            ],
            [
                'name' => 'studio1',
                'cinema_id' => Cinema::where('name','Bukan Cinema')->first()->id,
                'total_chair' => 144,

            ],
            [
                'name' => 'studio2',
                'cinema_id' => Cinema::where('name','Bukan Cinema')->first()->id,
                'total_chair' => 144,

            ],
        ];

        foreach($data as $value){
            Studio::create($value);
        }
    }
}
