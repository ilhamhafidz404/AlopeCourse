<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class TagController extends Controller
{
  public function index() {
    $tags = Tag::latest()->get();
    return view('admin.tag.index', compact('tags'));
  }

  public function create() {
    return view('admin.tag.create');
  }

  public function store(TagRequest $request) {
    Tag::create([
      'nama' => $request->nama,
      'slug' => Str::slug($request->nama),
      'badge' => $request->badge,
      'description' => $request->description,
      'icon' => $request->icon,
    ]);

    Alert::success('Tag Berhasil Ditambahkan', 'Sekarang tag ini bisa dipakai pada serie anda');
    return redirect(route('tag.index'));
  }

  public function show($id) {
    //
  }

  public function edit($slug) {
    $tag = Tag::whereSlug($slug)->first();
    return view('admin.tag.edit', compact('tag'));
  }

  public function update(TagRequest $request, $id) {
    Tag::find($id)->update([
      "nama" => $request->nama,
      "description" => $request->description,
      "icon" => $request->icon,
      "badge" => $request->badge,
    ]);

    Alert::success('Tag Berhasil Diedit', 'Data tag sekarang sudah berubah');
    return redirect()->route('tag.index');
  }

  public function destroy($id) {
    Tag::find($id)->delete();

    Alert::success('Tag Berhasil Dihapus');
    return back();
  }
}