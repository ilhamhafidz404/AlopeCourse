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
  public function index() {
    if (request("status")) {
      $categories = Category::filter(request(["status"]))->latest()->paginate(10)->load('tag');
    } else {
      $categories = Category::latest()->paginate(10)->load('tag');
    }
    return view("admin.category.index", compact('categories'));
  }

  public function create() {
    $tags = Tag::all();
    return view("admin.category.create", compact('tags'));
  }

  public function store(CategoryRequest $request) {
    if (!$request->thumbnail) {
      return back()->with("error_thumb", 'Thumbnail harus ada,, Silahkan isi data kembali');
    }
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public/thumbnail/serie', $thumbnail);
    Category::create([
      'nama' => $request->nama,
      'slug' => Str::slug($request->nama),
      'description' => $request->description,
      'level' => $request->level,
      'thumbnail' => $thumbnail
    ])->tag()->attach($request->tags);

    Alert::success('Berhasil Menambah Serie', 'Sekarang serie ini bisa dipakai');
    return redirect(route('series.index'));
  }

  public function show($id) {
    //
  }

  public function edit($slug) {
    $category = Category::where("slug", $slug)->first();
    $tags = Tag::all();
    return view("admin.category.edit", compact("category", 'tags'));
  }

  public function update(CategoryRequest $request, $id) {
    // Select category dengan id yang dipilih
    $category= Category::find($id);
    if (!$request->thumbnail) {
      // return back()->with("error_thumb", 'Thumbnail harus ada,, Silahkan isi data kembali');
      $thumbnail= $category->thumbnail;
    } else{
      if ($category->thumbnail != "default.jpg") {
        \File::delete('storage/thumbnail/serie/'.$category->thumbnail);
      }
      $thumbnail = time().".".$request->thumbnail->extension();
      $request->file('thumbnail')->storeAs('public/thumbnail/serie', $thumbnail);
    }
    $category->update([
      "nama" => $request->nama,
      "level" => $request->level,
      "description" => $request->description,
      "thumbnail" => $thumbnail,
      'status' => $request->status
    ]);
    $category->tag()->sync($request->tags);

    Alert::success('Serie berhasil diupdate');
    return redirect(route('series.index'));
  }

  public function destroy($id) {
    Category::find($id)->delete();
    Blog::whereCategory_id($id)->delete();

    Alert::success('Serie berhasil dihapus');
    return back();
  }
}