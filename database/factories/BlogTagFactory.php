<?php

namespace watabase\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagFactory extends Factory
{
  /**
  * The name of the factory's corresponding model.
  *
  * @var string
  */
  protected $model = Model::class;

  /**
  * Define the model's default state.
  *
  * @return array
  */
  public function definition() {
    return [
      "blog_id" => rand(1, 10),
      "tag_id" => rand(1, 3)
    ];
  }
}