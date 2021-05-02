<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $created_at = $faker->dateTime();
            DB::table('likes')->insert([
                'created_at' => $created_at,
                'updated_at' => $created_at,
                'user_id' => rand(1, 10),
                'post_id' => rand(1, 9),
            ]);
        }
    }
}
