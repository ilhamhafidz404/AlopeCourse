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
      [
        "nama" => "Laravel", 
        "slug" => "laravel", 
        "description" => "Laravel adalah Framework PHP Open Source, menggunakan konsep Model-View-Controller.", 
        "badge" => "salmon", 
        "icon" => "laravel"
      ],
      [
        "nama" => "Vue Js", 
        "slug" => "vue-js", 
        "description" => "Vue.js adalah Framework JavaScript yang bersifat progresif dan Open Source. Vue dirancang untuk bisa berjalan hanya di beberapa bagian halaman web atau sering disebut Single Page Application.", 
        "badge" => "lightgreen", 
        "icon" => "vuejs"
      ],
      [
        "nama" => "React Js", 
        "slug" => "react-js", 
        "description" => "React adalah framework front-end open source. Dikelola langsung oleh Facebook dan dapat digunakan sebagai basis dalam pengembangan aplikasi SPA atau mobile.", 
        "badge" => "lightskyblue", 
        "icon" => "react"
      ],
    ]);
  }
}