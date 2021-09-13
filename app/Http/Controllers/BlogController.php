<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
  public function list() {
    $blogs = Blog::latest()->paginate(10);
    return view('user.more.blog', compact('blogs'));
  }

  public function read($slug) {
    $blog = Blog::whereSlug($slug)->first();
    $serie = Category::whereId($blog->category_id)->first();
    return view('user.more.read-blog', compact('blog', 'serie'));
  }
}