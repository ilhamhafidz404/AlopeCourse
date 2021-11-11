<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\{CategorySeeder, TagSeeder, RoleSeeder, UserSeeder, TokenSeeder, NotificationSeeder, BiodataSeeder};
// use Database\Seeders\MessageSeeder;
use App\Models\{Blog, Video};

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
    // $this->call(MessageSeeder::class);
    
    Blog::factory()->count(10)->create();
    Video::factory()->count(10)->create();
    
    $this->call(BiodataSeeder::class);
    $this->call(TokenSeeder::class);
  }
}