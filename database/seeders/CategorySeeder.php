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
      ['nama' => 'Web Programming', "slug" => "web-programming"],
      ['nama' => 'Web Framework', "slug" => "web-framework"],
      ['nama' => 'Android Programming', "slug" => "android-programming"],
    ]);
  }
}