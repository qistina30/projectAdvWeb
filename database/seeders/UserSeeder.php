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
        /*DB::table('users')->insert([
            'name' => 'Supervisor',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'userLevel' => '0','userCategory' => 'Admin',
        ]);*/
        $users =[
            ['name'=>'qistina','email'=>'naqistina00@gmail.com', 'userLevel'=>'1',
                'userCategory'=>'volunteer','phone'=>'0111234579','password' => bcrypt('password123')],
            ['name'=>'Iman','email'=>'iman@gmail.com', 'userLevel'=>'1',
                'userCategory'=>'volunteer','phone'=>'0139341509','password' => bcrypt('password123')],
            ['name'=>'Ali','email'=>'ali@gmail.com', 'userLevel'=>'1',
                'userCategory'=>'volunteer','phone'=>'013930351','password' => bcrypt('password123')],

        ];

        DB::table('users')->insert($users);
    }
}
