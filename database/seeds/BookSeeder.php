<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $authors = \App\Models\Author::get()->toArray();
        $ids = \Illuminate\Support\Arr::pluck($authors, 'id');

        for ($i = 0; $i < 300; $i++) {
            \DB::table('books')
                ->insert([
                    'name' => $faker->word,
                    'author_id' => array_rand($ids),
                ]);
        }
    }
}
