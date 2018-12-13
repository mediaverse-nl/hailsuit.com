<?php

use Illuminate\Database\Seeder;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function randomNumber(){
        return random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400);
    }

    public function run()
    {
        $faker = Faker\Factory::create();

        $detail = new \App\Detail();

        $dimensions =

        $details = [
            'color' => ['geel', 'rood', 'zwart'],
            'dimension' => [$this->randomNumber(),$this->randomNumber(),$this->randomNumber()],
            'material' => ['polypropeen','polyvinylchloride','polyethylene terephthalate']
        ];

        $this->command->comment("Users table seeded :)");

        foreach ($details as $i => $v)
        {
            $new = $detail->create([
                'id' => null,
            ]);

            foreach ($detail->getLanguage()->get() as $lang){
                $new->translation()->create([
                    'text' => $lang->country_code_short .' - '. $i,
                    'language_id' => $lang->id
                ]);
            }
            $this->command->comment('-----start------');
            $this->command->comment($new);

            foreach ($v as $item){

                $this->command->comment('item: '.$item);

                $newProperty = $new->properties()->create([
                    'id' => null
                ]);

                $this->command->comment('property: '.$newProperty);
                $this->command->comment(' ');

                foreach ($detail->getLanguage()->get() as $lang){
                    $newProperty->translation()->insert([
                        'text' => $lang->country_code_short .' - '. $item,
                        'language_id' => $lang->id,
                        'commentable_type' => 'App\\Property',
                        'commentable_id' => $newProperty->id,
                    ]);
                    $this->command->comment('---'.$newProperty);
                }
            }
            $this->command->comment('-----end------');
        }

//        //color
//        DB::table('property')->insert([
//            'detail_id' => 1,
//            'value' => $faker->colorName(),
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 1,
//            'value' => $faker->colorName(),
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 1,
//            'value' => $faker->colorName(),
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 1,
//            'value' => $faker->colorName(),
//        ]);
        //dimension
//        DB::table('property')->insert([
//            'detail_id' => 2,
//            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 2,
//            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 2,
//            'value' => random_int(100, 300).' x '.random_int(300, 600).' x '.random_int(100, 400),
//        ]);
//        //material
//        DB::table('property')->insert([
//            'detail_id' => 3,
//            'value' => 'polypropeen',
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 3,
//            'value' => 'polyvinylchloride',
//        ]);
//        DB::table('property')->insert([
//            'detail_id' => 3,
//            'value' => 'polyethylene terephthalate',
//        ]);

    }
}
