<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Tag extends Model
{
  use HasFactory;


  public function Blog() {
    return $this->belogsToMany(Blog::class);
  }
}