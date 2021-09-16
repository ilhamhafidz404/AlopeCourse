<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
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
    $draffBlog = Blog::where("status", "draff")->get();

    $blogCount = $blogs->count();
    $blogDraffCount = Blog::where("status", "draff")->count();
    return view('admin.blog.index', compact('blogs', 'categories', 'tags', "draffBlog", 'blogCount', 'blogDraffCount'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.blog.create', compact('categories', 'tags'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(BlogRequest $request) {
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
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

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Blog $blog) {
    //$blog = Blog::whereSlug($slug)->first();
    return view('admin.blog.show', compact('blog'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Blog $blog) {
    //$blog = Blog::where("slug", $slug)->first();
    $categories = Category::all();
    $tags = Tag::all();

    return view("admin.blog.edit", compact("blog", "categories", "tags"));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(BlogRequest $request, $id) {
    if ($request->status == 'banned') {
      Blog::find($id)->update([
        "judul" => $request->judul,
        "category_id" => $request->category,
        "content" => $request->content,
        "content" => $request->content,
        "thumbnail" => $request->thumbnail,
        "status" => $request->status
      ]);
      Alert::warning('Blog Di Banned', 'Blog tidak akan terlihat oleh user');
    } else {
      $thumbnail = time().".".$request->thumbnail->extension();
      $request->file('thumbnail')->storeAs('public', $thumbnail);
      Blog::find($id)->update([
        "judul" => $request->judul,
        "category_id" => $request->category,
        "content" => $request->content,
        "thumbnail" => $thumbnail,
        "status" => $request->status
      ]);
      Alert::success('Berhasil Diedit', 'Blog menglami perubahan');
    }
    return redirect(route('blog.index'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Blog::find($id)->delete();

    Alert::success('Berhasil Dihapus', 'Blog Sekarang dihapus');
    return back();
  }
}