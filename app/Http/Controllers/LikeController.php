<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
  public function __invoke($blogId) {
    $like = Like::whereBlog_id($blogId)->whereUser_id(auth()->user()->id)->first();
    if ($like) {
      $like->delete();
      return back();
    }
    Like::create([
      'blog_id' => $blogId,
      'user_id' => auth()->user()->id
    ]);
    return back();
  }
}