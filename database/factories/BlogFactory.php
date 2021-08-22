<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = Blog::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition() {
    return [
      'judul' => $this->faker->sentence(rand(2, 3)),
      'slug' => Str::slug($this->faker->sentence(rand(2, 3)), "-"),
      'thumbnail' => 'default.jpg',
      'category_id' => rand(1, 3),
      'status' => "upload",
      'content' => $this->faker->paragraph(5),
    ];
  }
}