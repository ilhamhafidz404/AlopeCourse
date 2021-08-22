<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    \App\Models\Tag::insert([
      ["nama" => "Frontend", "slug" => "frontend", "description" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi frontend saja", "badge" => "red", "icon" => "laravel"],
      ["nama" => "Backend", "slug" => "beckend", "description" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi Backend saja", "badge" => "red", "icon" => "laravel"],
      ["nama" => "Fullstack", "slug" => "fullstack", "description" => "Tag khusus Blog yang memuat tutorial tentang Web Technology", "badge" => "red", "icon" => "laravel"],
    ]);
  }
}