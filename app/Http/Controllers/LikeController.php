<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use RealRashid\SweetAlert\Facades\Alert;

class LikeController extends Controller
{
  public function __invoke($blogId) {
    $like = Like::whereBlog_id($blogId)->whereUser_id(auth()->user()->id)->first();
    if ($like) {
      $like->delete();
      Alert::toast('Anda batal Menyukai Blog ini', 'info');
      return back();
    }
    Alert::toast('Anda menyukai Blog ini', 'success');

    Like::create([
      'blog_id' => $blogId,
      'user_id' => auth()->user()->id
    ]);
    return back();
  }
}