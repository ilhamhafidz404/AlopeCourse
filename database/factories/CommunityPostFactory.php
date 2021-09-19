<?php

namespace Database\Factories;

use App\Models\CommunityPost;
use Illuminate\Database\Eloquent\Factories\Factory;

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
      'content' => $this->faker->paragraph(rand(3, 5))
    ];
  }
}