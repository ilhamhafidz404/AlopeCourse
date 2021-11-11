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
      'username' => "adggvvmin",
      'email' => 'admin@admin.com',
      'email_verified_at' => now(),
      'password' => bcrypt('admin')
    ]);

    $admin->assignRole('admin');

    $active = User::create([
      'name' => "active",
      'username' => "actgghhive",
      'email' => 'active@user.com',
      'password' => bcrypt('active')
    ]);

    $active->assignRole('active');

    $premium = User::create([
      'name' => "premium",
      'username' => "preggghmium",
      'email' => 'premium@user.com',
      'email_verified_at' => now(),
      'password' => bcrypt('premium')
    ]);

    $premium->assignRole('premium');

    $banned = User::create([
      'name' => "banned",
      'username' => "bagggnned",
      'email' => 'banned@user.com',
      "status" => "banned",
      'password' => bcrypt('banned')
    ]);

    $banned->assignRole('banned');
  }
}