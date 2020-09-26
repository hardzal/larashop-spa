<?php

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BooksCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookCategory::insert([[
            'book_id' => 1,
            'category_id' => 1,
        ], [
            'book_id' => 1,
            'category_id' => 2
        ], [
            'book_id' => 2,
            'category_id' => 3,
        ], [
            'book_id' => 4,
            'category_id' => 3,
        ], [
            'book_id' => 1,
            'category_id' => 5,
        ], [
            'book_id' => 2,
            'category_id' => 6
        ], [
            'book_id' => 3,
            'category_id' => 7,
        ], [
            'book_id' => 4,
            'category_id' => 8
        ]
        ]);
    }
}
