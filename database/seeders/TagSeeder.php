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
      ["nama" => "Frontend", "slug" => "frontend", "description" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi frontend saja", "badge" => "salmon", "icon" => "laravel"],
      ["nama" => "Backend", "slug" => "beckend", "description" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi Backend saja", "badge" => "lightgreen", "icon" => "vuejs"],
      ["nama" => "Fullstack", "slug" => "fullstack", "description" => "Tag khusus Blog yang memuat tutorial tentang Web Technology", "badge" => "lightskyblue", "icon" => "react"],
    ]);
  }
}