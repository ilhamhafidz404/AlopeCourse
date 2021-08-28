<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class TopicController extends Controller
{
  public function __invoke() {
    if (request('tag')) {
      $series = Category::filter(request(['tag']))->latest()->paginate(10);
    } else {
      $series = Category::all();
    }
    $tags = Tag::all();
    return view('beranda.more.topic', compact('series', 'tags'));
  }
}