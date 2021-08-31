<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    $admin = User::create([
      'name' => "admin",
      'email' => 'admin@admin.com',
      'password' => bcrypt('admin')
    ]);

    $admin->assignRole('admin');

    $user = User::create([
      'name' => "user",
      'email' => 'user@user.com',
      'password' => bcrypt('user')
    ]);

    $user->assignRole('user');
  }
}