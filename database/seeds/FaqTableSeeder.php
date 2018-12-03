<?php

use App\AppLanguage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($x = 0; $x <= random_int(5, 10); $x++) {
            DB::table('faq')->insert(['id' => null]);
        }

        $langs = new AppLanguage;
        $faqs = new \App\FAQ();

        $faker = Faker\Factory::create();

        foreach ($faqs->get() as $faq){

            foreach ($langs->get() as $lang){
                $faq->faqTranslation()->insert([
                    'faq_id' => $faq->id,
                    'language_id' => $lang->id,
                    'title' => $lang->country_code_short.' - '. $faker->realText(20, 3),
                    'description' =>  $lang->country_code_short.' - '.$faker->sentences(10, true),
                ]);
            }
        }
    }
}
