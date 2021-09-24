<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;

class Video extends Model
{
  use HasFactory;
  protected $fillable = ['title',
    'thumbnail',
    'category_id',
    'slug',
    'episode',
    'description',
    'duration',
    'link'];
  public function Category() {
    return $this->belongsTo(Category::class);
  }


  public function getRouteKeyName() {
    return 'slug';
  }

}