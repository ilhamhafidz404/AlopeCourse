<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class DashboardController extends Controller
{
  public function __invoke() {
    $draffBlogList = Blog::whereStatus("draff")->orderBy("id", "DESC")->take(5)->get();
    $draffBlogCount = Blog::whereStatus("draff")->count();
    return view('dashboard.main', compact("draffBlogList", "draffBlogCount"));
  }
}