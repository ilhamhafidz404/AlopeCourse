<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Video;

class SerieController extends Controller
{
  public function index() {
    $series = Category::all();
    return view('user.pages.serie', compact('series'));
  }
  public function show($slug) {
    $serie = Category::whereSlug($slug)->first()->load('tag');
    $blogs = Blog::with(['user', 'category'])->whereCategory_id($serie->id)->get();
    $videos = Video::with(['category'])->whereCategory_id($serie->id)->latest()->get();
    return view('user.pages.show-serie', compact('serie', 'blogs', 'videos'));
  }
}