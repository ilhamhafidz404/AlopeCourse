<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;

class VideoController extends Controller
{
  public function index() {
    $videos = Video::with('category')->paginate(10);
    return view('user.pages.video', compact('videos'));
  }
  public function stream($slug) {
    $video = Video::whereSlug($slug)->with('category')->first();
    $videos = Video::whereCategory_id($video->category_id)->get();
    $category = Category::whereId($video->category_id)->with('tag')->first();
    $nextVideo = Video::whereId($video->id +1)->pluck('slug')->first();
    $prevVideo = Video::whereId($video->id -1)->pluck('slug')->first();
    $next = Video::whereCategory_id($category->id +1)->pluck('slug')->first();
    $prev = Video::whereCategory_id($category->id -1)->pluck('slug')->first();
    return view('user.pages.stream', compact('video', 'videos', 'next', 'prev', 'category', 'prevVideo', 'nextVideo'));
  }
}