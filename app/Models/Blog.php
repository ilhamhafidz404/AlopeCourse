<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;
use App\Models\Tag;

class Blog extends Model
{
  use HasFactory;
  protected $fillable = ['judul',
    'category_id',
    'content',
    'thumbnail',
    'status',
    'slug'];

  public function scopeFilter($query, array $filter) {
    $query->when($filter["serie"] ?? false, function($query, $filter) {
      $query->whereHas("Category", function($query) use($filter) {
        return  $query->where('slug', $filter);
      });
    });
  }

  public function Category() {
    return $this->belongsTo(Category::class);
  }

  public function Tag() {
    return $this->belongsToMany(Tag::class);
  }
}