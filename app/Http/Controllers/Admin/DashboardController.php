<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Video;
use App\Models\User;

class DashboardController extends Controller
{
  public function __invoke() {
    $video = Video::latest()->take(1)->first();

    $blogCount = Blog::count();
    $serieCount = Category::count();
    $tagCount = Tag::count();
    $userCount = User::count();
    $draffBlogList = Blog::whereStatus("draff")->orderBy("id", "DESC")->take(5)->get();
    $draffBlogCount = Blog::whereStatus("draff")->count();
    return view('admin.dashboard', compact("draffBlogList", "draffBlogCount", 'blogCount', 'serieCount', 'tagCount', 'video', 'userCount'));
  }
}