<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    static $hobby = [
        'Music',
        'Reading',
        'Traveling',
        'Tracking',
        'Swimming',
        'Cooking',
    ];

    public function run()
    {
        foreach (self::$hobby as $place) {
            DB::table('hobby')->insert([
                'name' => $place,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
