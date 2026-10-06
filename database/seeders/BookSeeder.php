<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $fiksi     = Category::where('name', 'Fiksi')->first();
        $nonFiksi  = Category::where('name', 'Non-Fiksi')->first();
        $teknologi = Category::where('name', 'Teknologi')->first();

        $books = [
            ['category_id' => $fiksi->id, 'title' => 'Laskar Pelangi',
             'author' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka',
             'year' => 2005, 'stock' => 10],

            ['category_id' => $fiksi->id, 'title' => 'Bumi Manusia',
             'author' => 'Pramoedya Ananta Toer', 'publisher' => 'Hasta Mitra',
             'year' => 1980, 'stock' => 7],

            ['category_id' => $nonFiksi->id, 'title' => 'Sapiens',
             'author' => 'Yuval Noah Harari',
             'publisher' => 'Kepustakaan Populer Gramedia',
             'year' => 2011, 'stock' => 5],

            ['category_id' => $teknologi->id, 'title' => 'Clean Code',
             'author' => 'Robert C. Martin', 'publisher' => 'Prentice Hall',
             'year' => 2008, 'stock' => 4],

            ['category_id' => $teknologi->id, 'title' => 'Laravel Up & Running',
             'author' => 'Matt Stauffer', 'publisher' => "O'Reilly Media",
             'year' => 2019, 'stock' => 6],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(['title' => $book['title']], $book);
        }
    }
}