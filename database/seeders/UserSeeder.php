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

    $active = User::create([
      'name' => "active",
      'email' => 'active@user.com',
      'password' => bcrypt('active')
    ]);

    $active->assignRole('active');

    $premium = User::create([
      'name' => "premium",
      'email' => 'premium@user.com',
      'password' => bcrypt('premium')
    ]);

    $premium->assignRole('premium');

    $banned = User::create([
      'name' => "banned",
      'email' => 'banned@user.com',
      'password' => bcrypt('banned')
    ]);

    $banned->assignRole('banned');
  }
}