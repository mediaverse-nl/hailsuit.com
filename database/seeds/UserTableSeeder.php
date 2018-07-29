<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            DB::table('users')->insert([
                'name' => str_random(8),
                'email' => str_random(12).'@mail.com',
                'password' => bcrypt('123456')
            ]);
        }

        DB::table('users')->insert([
            'name' => str_random(8),
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdasd')
        ]);
    }
}
