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
            'country_code_short' => 'nl',
            'country_code_large' => 'nl_NL',
            'country_code_flag' => 'nl',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 2,
            'country' => 'Español',
            'country_code_short' => 'es',
            'country_code_large' => 'es_ES',
            'country_code_flag' => 'es',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 3,
            'country' => 'Deutsch',
            'country_code_short' => 'de',
            'country_code_large' => 'de_DE',
            'country_code_flag' => 'de',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 4,
            'country' => 'Italiano',
            'country_code_short' => 'it',
            'country_code_large' => 'it_IT',
            'country_code_flag' => 'it',
            'currency' => '€',
        ]);
        DB::table('app_language')->insert([
            'id' => 5,
            'country' => 'English (GB)',
            'country_code_large' => 'en_GB',
            'country_code_flag' => 'gb',
            'currency' => '£',
        ]);
        DB::table('app_language')->insert([
            'id' => 6,
            'country' => 'français',
            'country_code_short' => 'fr',
            'country_code_large' => 'fr_FR',
            'country_code_flag' => 'fr',
            'currency' => '€',
        ]);
    }
}
