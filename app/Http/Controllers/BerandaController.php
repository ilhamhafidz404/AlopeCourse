<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class BerandaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __invoke() {
    $blogs = Blog::with(['category','user'])->latest()->take(7)->get();
    $series = Category::latest()->get()->load('tag');
    return view("welcome", compact('blogs', 'series'));
  }
}