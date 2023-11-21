<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          // Schema::disableForeignKeyConstraints();
        // DB::table('films')->truncate();
        // Schema::enableForeignKeyConstraints();
        $data = [
            [
                'judul' => 'film1',
                'sutradara' => 'sutradara1',
                'description' => 'film ini adalah film yang sangat menarik mengenai perjuangan anak muda dalam mencapai cita-citanya',
                'duration' => '120',
                'release_date' => '2021-01-01',
                'trailer' => 'https://www.youtube.com/watch?v=1VIZ89FEjYI',
                'cast' => "alicia, jevelyn, william, top, ivan",
                'age_cat'=> "R-13",
                'genre_id' => Genre::where('name', 'action')->first()->id,
                'country_id' => Country::where('name', 'indonesia')->first()->id,
            ],
            [
                'judul' => 'film2',
                'sutradara' => 'sutradara2',
                'description' => 'film ini adalah film yang sangat menarik mengenai perjuangan anak muda dalam mencapai cita-citanya',
                'duration' => '120',
                'release_date' => '2021-01-01',
                'trailer' => 'https://www.youtube.com/watch?v=1VIZ89FEjYI',
                'cast' => "alicia, jevelyn, william, top, ivan",
                'age_cat'=> "R-13",
                'genre_id' => Genre::where('name', 'action')->first()->id,
                'country_id' => Country::where('name', 'indonesia')->first()->id,
            ],

        ];

        foreach ($data as $value) {
            Film::create($value);
        }


    }
}
