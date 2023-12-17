<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('country')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data=[
            ['name' => 'indonesia'],
            ['name' => 'amerika'],
            ['name' => 'korea'],
            ['name' => 'jepang'],
        ];

        foreach($data as $value){
            Country::create($value);
        }


    }
}
