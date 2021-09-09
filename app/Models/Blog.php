<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Category;
use \App\Models\User;
use App\Models\Tag;

class Blog extends Model
{
  use HasFactory;
  protected $fillable = ['judul',
    'category_id',
    'content',
    'thumbnail',
    'status',
    'slug',
    'user_id'];

  public function scopeFilter($query, array $filter) {
    $query->when($filter["serie"] ?? false, function($query, $filter) {
      $query->whereHas("Category", function($query) use($filter) {
        return  $query->where('slug', $filter);
      });
    });

    $query->when($filter["status"] ?? false, function($query, $filter) {
      return  $query->where('status', $filter);
    });
  }

  public function Category() {
    return $this->belongsTo(Category::class);
  }

  public function User() {
    return $this->belongsTo(User::class);
  }

  public function Tag() {
    return $this->belongsToMany(Tag::class);
  }


  public function getRouteKeyName() {
    return 'slug';
  }
}