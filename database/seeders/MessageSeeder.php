<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    \App\Models\Message::insert([
      ["user_id" => 3, "subject" => "Coba Message", "message" => "Cuman coba coba ajj sih", "created_at" => now()]
    ]);
  }
}