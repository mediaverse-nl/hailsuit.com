<?php

use Illuminate\Database\Seeder;

class CarrosserieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('carrosserie')->insertGetId([
            'name' => 'Hatchback',
            'image' => ''
        ]);
        $id = DB::table('carrosserie')->insertGetId([
            'name' => 'MPV',
            'image' => ''
        ]);
        $id = DB::table('carrosserie')->insertGetId([
            'name' => 'Sedan',
            'image' => ''
        ]);
        $id = DB::table('carrosserie')->insertGetId([
            'name' => 'Stationwagon',
            'image' => ''
        ]);
    }
}
