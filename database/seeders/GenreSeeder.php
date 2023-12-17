<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('genre')->truncate();
        // Schema::enableForeignKeyConstraints();
        $data=[
            ['name' => 'action'],
            ['name' => 'adventure'],
            ['name' => 'comedy'],
            ['name' => 'drama'],
            ['name' => 'romance'],
            ['name' => 'horor'],
        ];

        foreach($data as $value){
            Genre::create($value);
        }
    }
}
