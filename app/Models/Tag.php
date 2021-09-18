<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\Category;

class Tag extends Model
{
  use HasFactory;

  protected $fillable = ['nama',
    'slug',
    'icon',
    'badge',
    'description'];

  public function Category() {
    return $this->belogsToMany(Category::class);
  }
}