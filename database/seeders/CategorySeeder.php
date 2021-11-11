<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    \App\Models\Category::insert([
      ['nama' => 'HTML Dasar', "slug" => "html-dasar", 'description' => "Hypertext Markup Language adalah bahasa markah standar untuk dokumen yang dirancang untuk ditampilkan di peramban internet.", 'thumbnail' => 'default.jpg', 'created_at' => now()],
      ['nama' => 'CSS Dasar', "slug" => "css-dasar", 'description' => "Cascading Style Sheet merupakan aturan untuk mengatur komponen dalam sebuah web agar lebih terstruktur dan seragam.", 'thumbnail' => 'default.jpg', 'created_at' => now()],
      ['nama' => 'CSS Layouting', "slug" => "css-layouting", 'description' => "CSS layouting adalah tehnik untuk mengatur tata letak sebuah halaman web dengan menggunakan kode CSS.", 'thumbnail' => 'default.jpg', 'created_at' => now()],
    ]);
  }
}