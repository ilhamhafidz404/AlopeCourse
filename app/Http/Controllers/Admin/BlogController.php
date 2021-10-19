<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  public function index() {
    if (request("serie")) {
      $blogs = Blog::filter(request(["serie"]))->latest()->paginate(10);
    } elseif (request('status')) {
      $blogs = Blog::filter(request(["status"]))->latest()->paginate(10);
    } else {
      $blogs = Blog::latest()->paginate(10);
    }
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.blog.index', compact('blogs', 'categories', 'tags'));
  }

  public function create() {
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.blog.create', compact('categories', 'tags'));
  }

  public function store(BlogRequest $request) {
    if (!$request->thumbnail) {
      return back()->with("error_thumb", 'Thumbnail harus ada,, Silahkan isi data kembali');
    }
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public/thumbnail/blog', $thumbnail,);
    Blog::create([
      'status' => $request->status,
      'judul' => $request->judul,
      'slug' => Str::slug($request->judul),
      'category_id' => $request->category,
      'content' => $request->content,
      'thumbnail' => $thumbnail,
      'user_id' => auth()->user()->id
    ]);

    if ($request->status == "draff") {
      Alert::info('Disimpan Sebagai Draff', 'Blog disimpan untuk diperbaiki');
      return redirect(route('blog.index'));
    }
    Alert::success('Berhasil Diupload', 'Blog baru telah ditambahkan');
    return redirect(route('blog.index'));
  }

  public function show($slug) {
    $blog = Blog::whereSlug($slug)->first();
    $likes = Like::whereBlog_id($blog->id)->count();
    return view('admin.blog.show', compact('blog', 'likes'));
  }

  public function edit(Blog $blog) {
    //$blog = Blog::where("slug", $slug)->first();
    $categories = Category::all();
    $tags = Tag::all();

    return view("admin.blog.edit", compact("blog", "categories", "tags"));
  }

  public function update(Request $request, $id) {
    // Select Blog dari Id yang dikirim
    $blog = Blog::find($id);
    if (!$request->thumbnail) {
      // Jika request dari name thumbnail tidak ada, variable thumbnail diisi oleh thumbnail sebelumnya
      $thumbnail= $blog->thumbnail;
    } else{
      // jika Blog thumbnail bukan 'default.jpg', delete gambarnya
      if($blog->thumbnail != 'default.jpg'){
        \File::delete('storage/thumbnail/blog/'.$blog->thumbnail);
      }
      $thumbnail = time().".".$request->thumbnail->extension();
      $request->file('thumbnail')->storeAs('public/thumbnail/blog', $thumbnail);
    }
    $blog->update([
      "judul" => $request->judul,
      "category_id" => $request->category,
      "content" => $request->content,
      "thumbnail" => $thumbnail,
      "status" => $request->status
    ]);
    Alert::success('Berhasil Diedit', 'Blog menglami perubahan');
    return redirect(route('blog.index'));
  }

  public function destroy($id) {
    Blog::find($id)->delete();

    Alert::success('Blog Berhasil Dihapus');
    return back();
  }

  public function addSyntax($slug) {
    $blog = Blog::whereSlug($slug)->first();

    return view('admin.blog.addSyntax');
  }
}