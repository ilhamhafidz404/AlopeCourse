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
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $tags = Tag::latest()->get();
    return view('admin.tag.index', compact('tags'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('admin.tag.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
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
  public function edit($id) {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(TagRequest $request, $id) {
    Tag::find($id)->update([
      "nama" => $request->nama,
      "description" => $request->description,
      "icon" => $request->icon,
      "badge" => $request->badge,
    ]);

    Alert::success('Tag Berhasil Diedit', 'Data tag sekarang sudah berubah');
    return back();
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Tag::find($id)->delete();

    Alert::success('Tag Berhasil Dihapus');
    return back();
  }
}