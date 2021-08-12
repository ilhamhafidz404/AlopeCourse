<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;

class Blog extends Model
{
  use HasFactory;
  protected $fillable = ['judul',
    'category_id',
    'content',
    'thumbnail',
    'slug'];

  public function Category() {
    return $this->belongsTo(Category::class);
  }
}