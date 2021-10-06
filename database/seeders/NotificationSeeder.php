<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    \App\Models\Notification::insert([
      [
        "user_id" => 1,
        "subject" => "Selamat Datang di ALOPE",
        "message" => "ALOPE merupakan tempat belajar programming yang menyenangkan",
        "created_at" => now()
      ]
    ]);
  }
}