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
      ["nama" => "Frontend", "slug" => "frontend", "keterangan" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi frontend saja"],
      ["nama" => "Backend", "slug" => "beckend", "keterangan" => "Tag khusus Blog yang memuat tutorial hanya menggunakan teknologi Backend saja"],
      ["nama" => "Fullstack", "slug" => "fullstack", "keterangan" => "Tag khusus Blog yang memuat tutorial tentang Web Technology"],
    ]);
  }
}