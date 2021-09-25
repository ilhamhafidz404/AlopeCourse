<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;

class BlogSyntaxController extends Controller
{
  public function index() {
    $blogs = Blog::whereStatus('draff')->latest()->get();
    return view('admin.blog.blogSyntax.index', compact('blogs'));
  }

  public function add($slug) {
    $blog = Blog::whereSlug($slug)->first();

    return view('admin.blog.blogSyntax.add', compact('blog'));
  }

  public function save(Request $request, $id) {
    $blog = Blog::find($id);
    $blog->update([
      'content' => $request->content
    ]);
    Alert::success('Berhasil Diupload', 'Blog baru telah ditambahkan');
    return redirect(route('blog.show', $blog->slug));
  }
}