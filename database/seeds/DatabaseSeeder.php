<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(BodyTableSeeder::class);
         $this->call(AppLanguageTableSeeder::class);
         $this->call(DetailTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(BarcodeTableSeeder::class);
         $this->call(BrandTableSeeder::class);
         $this->call(FaqTableSeeder::class);
    }
}
