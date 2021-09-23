<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = Video::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition() {
    return [
      'title' => $this->faker->sentence(rand(2, 3)),
      'slug' => Str::slug($this->faker->sentence(rand(2, 3)), "-"),
      'category_id' => rand(1, 3),
      'description' => $this->faker->paragraph(5),
      'episode' => rand(1, 50),
      'link' => 'https://www.youtube.com/embed/N7iY-jNWeFc'
    ];
  }
}