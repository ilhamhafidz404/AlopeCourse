<?php

namespace Database\Factories;

use App\Models\CommunityPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommunityPostFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = CommunityPost::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition() {
    return [
      'title' => $this->faker->sentence(rand(2, 4)),
      'slug' => Str::slug($this->faker->sentence(rand(2, 3)), "-"),
      'content' => $this->faker->paragraph(rand(3, 5))
    ];
  }
}