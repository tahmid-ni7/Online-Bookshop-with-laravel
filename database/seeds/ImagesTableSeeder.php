<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [];

        for($i=1; $i <= 30; $i++)
        {
            $images_file = "book_". rand(1,25).".jpg";

            $images [] = [
                'file' => $images_file
            ];
        }
        DB::table('images')->truncate();

        DB::table('images')->insert($images);
    }

}
