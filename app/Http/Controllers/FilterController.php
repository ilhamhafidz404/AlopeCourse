<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
  public function dashboardByTag($tag) {
    $tag = DB::table('blog_tag')->where('tag_id', $tag)->get();
    return view('welcome', compact('tag'));
  }
}