<?php

namespace Database\Seeders;

use App\Models\Category; // Sesuaikan dengan namespace yang sesuai dengan model Category Anda
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori berita yang ingin Anda tambahkan
        $categories = [
            [
                'title' => 'Berita Teknologi',
                'seotitle' => 'Berita Teknologi',
                'slug' => 'berita-teknologi',
                'active' => true, // Menggunakan boolean untuk aktif (true) atau tidak aktif (false)
            ],
            [
                'title' => 'Berita Bisnis',
                'seotitle' => 'Berita Bisnis',
                'slug' => 'berita-bisnis',
                'active' => true,
            ],
            [
                'title' => 'Berita Hiburan',
                'seotitle' => 'Berita Hiburan',
                'slug' => 'berita-hiburan',
                'active' => true,
            ],
            // Tambahkan kategori berita lainnya sesuai kebutuhan
        ];

        // Memasukkan kategori-kategori ke dalam database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
