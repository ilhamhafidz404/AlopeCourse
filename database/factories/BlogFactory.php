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
      'judul' => $this->faker->name(),
      'slug' => Str::slug($this->faker->name(), "-"),
      'thumbnail' => 'default.jpg',
      'category_id' => rand(1, 3),
      'status' => "draff",
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati minima error nihil eveniet tempore voluptatibus rem commodi amet quod, quia deserunt deleniti aperiam neque, aut nesciunt ut? Sequi, laudantium, ut.',
    ];
  }
}