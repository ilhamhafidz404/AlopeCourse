<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    \App\Models\Token::insert([
      ["token" => "qwerty",
        "user_id" => 2,
        "type" => "silver"],
      ["token" => "zzz",
        "user_id" => 0,
        "type" => "gold"],
    ]);
  }
}