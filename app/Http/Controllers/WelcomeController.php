<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Category;

class WelcomeController extends Controller
{
  public function __invoke() {
    $blogs = Blog::all()->take(9);
    $videos = Video::all()->take(3);
    $categories = Category::all()->take(7);
    return view('welcome', compact('blogs', 'videos', 'categories'));
  }
}