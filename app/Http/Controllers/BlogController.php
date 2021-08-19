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
      $blogs = Blog::filter(request(["serie"]))->orderBy('id', 'DESC')->paginate(10);
    } else {
      $blogs = Blog::where('status', 'upload')->filter(request(["serie"]))->orderBy('id', 'DESC')->paginate(10);
    }
    $categories = Category::all();
    $tags = Tag::all();
    $draffBlog = Blog::where("status", "draff")->get();
    return view('dashboard.blog.index', compact('blogs', 'categories', 'tags', "draffBlog"));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    $categories = Category::all();
    return view('dashboard.blog.create', compact('categories'));
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
    ])->tag()->attach($request->tags);

    if ($request->status == "draff") {
      Alert::info('Draff', 'Blog baru telah ditamba,hkan');
      return redirect(route('blog.index'));
    }
    Alert::success('Berhasil Diupload', 'Blog baru telah ditamba,hkan');
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
    return view("dashboard.blog.edit", compact("blog", "categories"));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    Blog::find($id)->update([
      "judul" => $request->judul,
      "category_id" => $request->category,
      "content" => $request->content,
      "thumbnail" => $request->thumbnail,
      "status" => $request->status
    ]);
    Alert::success('Berhasil diedit', '');
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