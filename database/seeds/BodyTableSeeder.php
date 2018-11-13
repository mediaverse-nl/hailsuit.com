<?php

use Illuminate\Database\Seeder;

class BodyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = new \App\Body();

        $bodies = ['Hatchback', 'MPV', 'Sedan', 'Stationwagon'];

        foreach ($bodies as $b)
        {
            $newBody = $body->create([
                'image' => '',
            ]);

            $this->command->comment($newBody);

            $body->insertTranslation($newBody, $b);
        }
    }
}
