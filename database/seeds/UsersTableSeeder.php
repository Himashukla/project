<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {        
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'master@admin.com',
            'password' => bcrypt('password'),
            'city_id' => 1,
            'gender' => 'Female',
            'status' => 'Approved',
        ]);        
    }
}
