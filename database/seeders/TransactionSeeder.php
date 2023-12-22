<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Schema::disableForeignKeyConstraints();
        // DB::table('transactions')->truncate();
        // Schema::enableForeignKeyConstraints();

        $data=[
            [
                'user_id' => User::where('username','user')->first()->id,
                'total' => 30000,
            ],
        ];
        
        foreach($data as $value){
            Transaction::create($value);
        }

    }
}
