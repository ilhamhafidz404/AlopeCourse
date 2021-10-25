<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Like;

class BlogController extends Controller
{
  public function list() {
    $blogs = Blog::with(['user', 'category'])->latest()->paginate(12);
    return view('user.pages.blog', compact('blogs'));
  }

  public function read($slug) {
    $blog = Blog::whereSlug($slug)->first();
    $next = Blog::where('id', $blog->id +1)->pluck('slug')->first();
    $previous = Blog::where('id', $blog->id -1)->pluck('slug')->first();
    $serie = Category::whereId($blog->category_id)->first();
    $similiar_blogs = Blog::whereCategory_id($serie->id)->get();
    $likes = Like::whereBlog_id($blog->id)->count();
    $ilike = Like::whereBlog_id($blog->id)->whereUser_id(auth()->user()->id)->first();
    return view('user.pages.read-blog', compact('blog', 'serie', 'likes', 'ilike', 'next', 'previous', 'similiar_blogs'));
  }
}