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
      ['nama' => 'HTML Dasar', "slug" => "html-dasar", 'keterangan' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#e34c26'],
      ['nama' => 'CSS Dasar', "slug" => "css-dasar", 'keterangan' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#264de4'],
      ['nama' => 'CSS Layouting', "slug" => "css-layouting", 'keterangan' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, voluptate sapiente amet accusamus,", 'badge' => '#264de4'],
    ]);
  }
}