<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'id' => 1,
            'price' => number_format(random_int(1, 400), 2),
            'discount' => 0,
            'stock' => random_int(1, 20)
        ]);

        DB::table('product')->insert([
            'id' => 2,
            'price' => number_format(random_int(1, 400), 2),
            'discount' => 0,
            'stock' => random_int(1, 20)
        ]);

        DB::table('product')->insert([
            'id' => 3,
            'price' => number_format(random_int(1, 400), 2),
            'discount' => 0,
            'stock' => random_int(1, 20)
        ]);

        AppLanguage::count();

//        product_translation
    }
}
