<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'Engineering',
                'slug' => 'engineering'
            ],
            [
                'name'  => 'Sociology',
                'slug'  => 'sociology'
            ],
            [
                'name'  => 'Literature',
                'slug'  => 'literature'
            ],
            [
                'name'  => 'Business Studies',
                'slug'  => 'business-studies'
            ],
            [
                'name'  => 'Economics',
                'slug'  => 'economics'
            ],
            [
                'name'   => 'Medical',
                'slug'   => 'medical'
            ],
            [
                'name'  => 'Text Books',
                'slug'  => 'text-books'
            ]
        ]);
    }
}
