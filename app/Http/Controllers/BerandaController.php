<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommunityPost;

class BerandaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __invoke() {
    $blogs = Blog::latest()->take(7)->get();
    $series = Category::latest()->get();
    $c_post = CommunityPost::latest()->first();
    return view("welcome", compact('blogs', 'series', 'c_post'));
  }
}