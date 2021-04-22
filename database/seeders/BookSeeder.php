<?php

namespace Database\Seeders;

use App\Models\Book;
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
      for($i = 1; $i <= 50; $i++){
        $books = new Book();

        $books->book_name = 'this is a book';
        $books->book_cover = '';
        $books->pdf = 'storage/backend/pdf/Code_geass.pdf';
        $books->save();
      }
        
    }
}
