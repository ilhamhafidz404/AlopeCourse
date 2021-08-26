<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
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
    return view("dashboard.category.index", compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view("dashboard.category.create");
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public', $thumbnail);
    Category::create([
      'nama' => $request->nama,
      'slug' => Str::slug($request->nama),
      'description' => $request->description,
      'thumbnail' => $thumbnail
    ]);
    Alert::success('Berhasil Diupload', 'gg');
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
    return view("dashboard.category.edit", compact("category"));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    Category::find($id)->update([
      "nama" => $request->nama,
      "description" => $request->description,
      "thumbnail" => $request->thumbnail
    ]);
    Alert::success('Berhasil diedit', '');
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

    return back();
  }
}