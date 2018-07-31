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

        $faker = Faker\Factory::create();
        //color
        DB::table('property')->insert([
            'detail_id' => 1,
            'value' => $faker->colorName(),
        ]);
        DB::table('property')->insert([
            'detail_id' => 1,
            'value' => $faker->colorName(),
        ]);
        DB::table('property')->insert([
            'detail_id' => 1,
            'value' => $faker->colorName(),
        ]);
        DB::table('property')->insert([
            'detail_id' => 1,
            'value' => $faker->colorName(),
        ]);
        //dimension
        DB::table('property')->insert([
            'detail_id' => 2,
            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
        ]);
        DB::table('property')->insert([
            'detail_id' => 2,
            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
        ]);
        DB::table('property')->insert([
            'detail_id' => 2,
            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
        ]);
        //material
        DB::table('property')->insert([
            'detail_id' => 3,
            'value' => 'polypropeen',
        ]);
        DB::table('property')->insert([
            'detail_id' => 3,
            'value' => 'polyvinylchloride',
        ]);
        DB::table('property')->insert([
            'detail_id' => 3,
            'value' => 'polyethylene terephthalate',
        ]);

    }
}
