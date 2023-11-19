<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = [
        //     ['username' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin')]
        // ];

        // foreach ($admin as  $value) {
        //     Admin::create($value);
        // }

        $data = [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ];

        Admin::create($data);

    }
}
