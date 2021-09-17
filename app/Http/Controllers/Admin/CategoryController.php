<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Tag;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $categories = Category::all();
    return view("admin.category.index", compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    $tags = Tag::all();
    return view("admin.category.create", compact('tags'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CategoryRequest $request) {
    if (!$request->thumbnail) {
      return back()->with("error_thumb", 'Thumbnail harus ada,, Silahkan isi data kembali');
    }
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
    Category::create([
      'nama' => $request->nama,
      'slug' => Str::slug($request->nama),
      'description' => $request->description,
      'thumbnail' => $thumbnail
    ])->tag()->attach($request->tags);

    Alert::success('Berhasil Menambah Serie', 'Sekarang serie ini bisa dipakai');
    return redirect(route('series.index'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($slug) {
    $category = Category::where("slug", $slug)->first();
    $tags = Tag::all();
    return view("admin.category.edit", compact("category", 'tags'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(CategoryRequest $request, $id) {
    if (!$request->thumbnail) {
      return back()->with("error_thumb", 'Thumbnail harus ada,, Silahkan isi data kembali');
    }
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
    $category = Category::find($id);
    $category->update([
      "nama" => $request->nama,
      "description" => $request->description,
      "thumbnail" => $thumbnail,
      'status' => $request->status
    ]);
    $category->tag()->sync($request->tags);

    Alert::success('Serie berhasil diupdate');
    return redirect(route('series.index'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Category::find($id)->delete();
    Blog::whereCategory_id($id)->delete();

    Alert::success('Serie berhasil dihapus');
    return back();
  }
}