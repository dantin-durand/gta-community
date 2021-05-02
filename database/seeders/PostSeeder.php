<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 9; $i++) {

            $body = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $created_at = $faker->dateTime();
            DB::table('posts')->insert([
                'created_at' => $created_at,
                'updated_at' => $created_at,
                'body' => $body,
                'user_id' => rand(1, 10),
            ]);
        }
    }
}
