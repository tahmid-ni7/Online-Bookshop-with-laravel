<?php

use App\Review;
use Carbon\Carbon;
use Faker\Factory;
use App\Book;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $reviews = [];

        $books = Book::orderBy('id','DESC')->take(15)->get();
        foreach ($books as $book)
        {
            for ($i = 1; $i <= rand(1, 8); $i++)
            {
                $reviewDate = Carbon::now();
                $reviews[] = [
                    'user_id'      => rand(1,3),
                    'book_id'      => $book->id,
                    'body'         => $faker->paragraphs(rand(1, 4), true),
                    'created_at'   => $reviewDate,
                    'updated_at'   =>  $reviewDate,
                ];
            }

        }
        Review::truncate();
        Review::insert($reviews);
    }
}
