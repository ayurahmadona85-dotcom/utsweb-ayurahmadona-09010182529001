<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi',     'description' => 'Buku cerita dan novel fiksi.'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku ilmiah, sejarah, dan biografi.'],
            ['name' => 'Teknologi', 'description' => 'Buku pemrograman dan teknologi informasi.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}