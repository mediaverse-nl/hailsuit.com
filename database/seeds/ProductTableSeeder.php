<?php

use App\AppLanguage;
use App\Product;
use Carbon\Carbon;
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
            'stock' => random_int(1, 20),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('product')->insert([
            'id' => 2,
            'price' => number_format(random_int(1, 400), 2),
            'discount' => 0,
            'stock' => random_int(1, 20),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('product')->insert([
            'id' => 3,
            'price' => number_format(random_int(1, 400), 2),
            'discount' => 0,
            'stock' => random_int(1, 20),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $langs = new AppLanguage;
        $products = new Product;

        $faker = Faker\Factory::create();

        foreach ($products->get() as $product){

            foreach ($langs->get() as $lang){

                $products->productTranslation()->insert([
                   'product_id' => $product->id,
                   'language_id' => $lang->id,
                   'name' => $faker->realText(20, 3),
                   'description' => $faker->sentences(10, true),
                ]);
            }

            for ($x = 0; $x <= random_int(0, 2); $x++) {
                $products->barcodes()->insert([
                    'product_id' => $product->id,
                    'value' =>  $faker->randomNumber(8),
                ]);
            }

            $collection = array_rand([1, 2, 3,4,5,6,7,8,9,10], random_int(1, 3));

            if (!in_array(0, collect($collection)->toArray()))
            {
                foreach (collect($collection)->toArray() as $col)
                {
                    $products->productProperties()->insert([
                        'product_id' => $product->id,
                        'property_id' => (int)$col,
                    ]);
                }

            }

        }

    }
}
