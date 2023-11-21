<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('city')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data= [
            [
                'name'=>'surabaya',
                'country_id'=>Country::where('name','indonesia')->first()->id
            ],
            [
                'name'=>'jakarta',
                'country_id'=>Country::where('name','indonesia')->first()->id
            ],
            [
                'name'=>'bandung',
                'country_id'=>Country::where('name','indonesia')->first()->id
            ],
            [
                'name'=>'seoul',
                'country_id'=>Country::where('name','korea')->first()->id
            ],
            [
                'name'=>'tokyo',
                'country_id'=>Country::where('name','jepang')->first()->id
            ],
            [
                'name'=>'new york',
                'country_id'=>Country::where('name','amerika')->first()->id
            ],
        ];

        foreach($data as $value){
            City::create($value);
        }
    }
}
