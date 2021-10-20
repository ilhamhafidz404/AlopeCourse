<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class TopicController extends Controller
{
  public function index() {
    if (request('tag')) {
      $series = Category::filter(request(['tag']))->latest()->paginate(10)->load('tag');
    } else {
      $series = Category::all()->load('tag');
    }
    $tags = Tag::all();
    $tag = Tag::whereSlug(request('tag'))->first();
    return view('user.more.topic', compact('series', 'tags', 'tag'));
  }

  public function show($slug) {
    $series = Category::all();
    return view('user.more.show', compact('series'));
  }
}