<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TagSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TokenSeeder;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\MessageSeeder;
use App\Models\Blog;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run() {
    $this->call(CategorySeeder::class);
    $this->call(TagSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(NotificationSeeder::class);
    $this->call(MessageSeeder::class);

    Blog::factory()->count(10)->create();
    Video::factory()->count(10)->create();

    $this->call(TokenSeeder::class);
  }
}