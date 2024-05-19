<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert 1
        DB::table('users')->insert([
            'name' => 'Supervisor',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'userLevel' => '0','userCategory' => 'Admin',
        ]);
    }
}
