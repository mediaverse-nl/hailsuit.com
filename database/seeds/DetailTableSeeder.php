<?php

use Illuminate\Database\Seeder;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail')->insert([
            'id' => 1,
            'value' => 'color'
        ]);

        DB::table('detail')->insert([
            'id' => 2,
            'value' => 'dimension'
        ]);

        DB::table('detail')->insert([
            'id' => 3,
            'value' => 'material'
        ]);
    }
}
