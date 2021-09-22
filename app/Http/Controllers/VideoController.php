<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
  public function index() {
    //
  }
  public function stream($slug) {
    $video = Video::whereSlug($slug)->first();
    $videos = Video::whereCategory_id($video->category_id)->get();
    return view('user.more.stream', compact('video', 'videos'));
  }
}