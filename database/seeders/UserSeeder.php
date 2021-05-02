<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $name = $faker->name();
            $email = $faker->email();
            $created_at = $faker->dateTime();
            DB::table('users')->insert([
                'created_at' => $created_at,
                'updated_at' => $created_at,
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('patate'),
                'imageUrl' => env('DEFAULT_AVATAR'),
            ]);
        }
    }
}
