<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;

class Video extends Model
{
  use HasFactory;
  protected $fillable = ['title',
    'category_id',
    'slug',
    'description',
    'link'];
  public function Category() {
    return $this->belongsTo(Category::class);
  }

}