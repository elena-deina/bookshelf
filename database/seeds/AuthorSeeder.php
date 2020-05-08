<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \DB::table('authors')
                ->insert([
                    'last_name' => $faker->lastName,
                    'first_name' => $faker->firstName,
                ]);
        }
    }
}
