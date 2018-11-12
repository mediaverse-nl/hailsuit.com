<?php

use Illuminate\Database\Seeder;

class BodyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('car_body')->insertGetId([
            'name' => 'Hatchback',
            'image' => ''
        ]);
        $id = DB::table('car_body')->insertGetId([
            'name' => 'MPV',
            'image' => ''
        ]);
        $id = DB::table('car_body')->insertGetId([
            'name' => 'Sedan',
            'image' => ''
        ]);
        $id = DB::table('car_body')->insertGetId([
            'name' => 'Stationwagon',
            'image' => ''
        ]);
    }
}
