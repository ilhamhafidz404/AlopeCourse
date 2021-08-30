<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Video;


class DashboardController extends Controller
{
  public function __invoke() {
    $video = Video::latest()->take(1)->first();

    $blogCount = Blog::count();
    $serieCount = Category::count();
    $tagCount = Tag::count();
    $draffBlogList = Blog::whereStatus("draff")->orderBy("id", "DESC")->take(5)->get();
    $draffBlogCount = Blog::whereStatus("draff")->count();
    return view('dashboard.main', compact("draffBlogList", "draffBlogCount", 'blogCount', 'serieCount', 'tagCount', 'video'));
  }
}