<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_language')->insert([
            'id' => 1,
            'country' => 'Nederland',
            'country_code' => 'NL',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 2,
            'country' => 'Español',
            'country_code' => 'ES',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 3,
            'country' => 'Deutsch',
            'country_code' => 'DE',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 4,
            'country' => 'Italiano',
            'country_code' => 'IT',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 5,
            'country' => 'English (GB)',
            'country_code' => 'EN',
            'currency' => '£',
        ]);
        DB::table('app_language')->insert([
            'id' => 6,
            'country' => 'français',
            'country_code' => 'FR',
            'currency' => '€',
        ]);
    }
}
