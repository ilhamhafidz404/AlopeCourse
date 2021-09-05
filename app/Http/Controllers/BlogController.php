<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    return view('dashboard.blog.index', compact('blogs', 'categories', 'tags', "draffBlog", 'blogCount', 'blogDraffCount'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    $categories = Category::all();
    $tags = Tag::all();
    return view('dashboard.blog.create', compact('categories', 'tags'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $request->validate([
      "judul" => "required",
      'content' => "required",
      'category' => "required",
      'status' => "required",
      "thumbnail" => "required"
    ]);


    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
    Blog::create([
      'status' => $request->status,
      'judul' => $request->judul,
      'slug' => Str::slug($request->judul),
      'category_id' => $request->category,
      'content' => $request->content,
      'thumbnail' => $thumbnail
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
  public function show($slug) {
    $blog = Blog::whereSlug($slug)->first();
    return view('dashboard.blog.show', compact('blog'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($slug) {
    $blog = Blog::where("slug", $slug)->first();
    $categories = Category::all();
    $tags = Tag::all();

    return view("dashboard.blog.edit", compact("blog", "categories", "tags"));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
    Blog::find($id)->update([
      "judul" => $request->judul,
      "category_id" => $request->category,
      "content" => $request->content,
      "thumbnail" => $thumbnail,
      "status" => $request->status
    ]);
    if ($request->status == 'banned') {
      Alert::warning('Blog Di Banned', 'Blog tidak akan terlihat oleh user');
    } else {
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
    //
  }
}