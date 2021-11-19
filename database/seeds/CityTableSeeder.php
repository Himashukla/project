<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    static $city = [
        'Bhavnagar',
        'Ahmedabad',
        'Vadodara',
        'Gandhinagar',
        'Rajkot',
        'Surat',
    ];

    public function run()
    {
        foreach (self::$city as $place) {
            DB::table('city')->insert([
                'name' => $place,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
