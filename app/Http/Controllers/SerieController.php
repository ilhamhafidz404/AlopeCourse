<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class SerieController extends Controller
{
  public function index() {
    return view('user.more.serie');
  }
  public function show($slug) {
    $serie = Category::whereSlug($slug)->first();
    $blogs = Blog::whereCategory_id($serie->id)->get();
    return view('user.more.show-serie', compact('serie', 'blogs'));
  }
}