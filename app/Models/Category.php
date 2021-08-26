<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Blog;
use \App\Models\Tag;

class Category extends Model
{
  use HasFactory;

  protected $fillable = ['nama',
    'slug',
    'thumbnail',
    'badge',
    'description'];

  public function Blog() {
    return $this->hasMany(Blog::class);
  }

  public function Tag() {
    return $this->belongsToMany(Tag::class);
  }
}