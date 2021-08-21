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
      ['nama' => 'HTML Dasar', "slug" => "html-dasar", 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#e34c26', 'thumbnail' => 'default.jpg'],
      ['nama' => 'CSS Dasar', "slug" => "css-dasar", 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#264de4', 'thumbnail' => 'default.jpg'],
      ['nama' => 'CSS Layouting', "slug" => "css-layouting", 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#264de4', 'thumbnail' => 'default.jpg'],
    ]);
  }
}