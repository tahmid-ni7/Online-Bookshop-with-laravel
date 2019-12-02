<?php

use Faker\Factory;
use App\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $authors = [];

        for($i = 1; $i <= 8; $i++)
        {
            $authors [] = [
                'name' => $faker->name,
                'slug'=> $faker->slug(2),
                'bio' => $faker->paragraphs(rand(2,4), true)
            ];
        }

        Author::truncate();
        Author::insert($authors);
    }
}
