<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('brand')->insertGetId([
            'name' => 'Tesla',
            'image' => ''
        ]);
        DB::table('type')->insert([
            ['value' => 'Model X', 'model_year' => '2017', 'brand_id' => $id, 'product_id' => 1],
            ['value' => 'Model S', 'model_year' => '2017', 'brand_id' => $id, 'product_id' => 1],
            ['value' => 'Model X', 'model_year' => '2018', 'brand_id' => $id, 'product_id' => 1],
            ['value' => 'Model S', 'model_year' => '2018', 'brand_id' => $id, 'product_id' => 1]
        ]);
        //break

        $id = DB::table('brand')->insertGetId([
            'name' => 'Hummer',
            'image' => ''
        ]);
        //break

        $id = DB::table('brand')->insertGetId([
            'name' => 'Audi',
            'image' => ''
        ]);
        DB::table('type')->insert([
            ['value' => 'A5', 'model_year' => '2007', 'brand_id' => $id, 'product_id' => 3],
            ['value' => 'A5', 'model_year' => '2009', 'brand_id' => $id, 'product_id' => 3]
        ]);
        //break

        DB::table('brand')->insert([
            'name' => 'Mercedes',
            'image' => ''
        ]);
        //break

        $id = DB::table('brand')->insertGetId([
            'name' => 'Ferrari',
            'image' => ''
        ]);
        DB::table('type')->insert([
            ['value' => 'F355', 'model_year' => '1998', 'brand_id' => $id, 'product_id' => 2],
            ['value' => 'F355', 'model_year' => '1997', 'brand_id' => $id, 'product_id' => 2]
        ]);
    }
}
