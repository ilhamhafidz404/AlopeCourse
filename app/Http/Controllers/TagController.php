<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    return view('dashboard.tag.index', compact('tags'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('dashboard.tag.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    Tag::create([
      'nama' => $request->nama,
      'slug' => Str::slug($request->nama),
      'badge' => $request->badge,
      'description' => $request->description,
      'icon' => $request->icon,
    ]);
    Alert::success('Berhasil Diupload', 'gg');
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
  public function update(Request $request, $id) {
    Tag::find($id)->update([
      "nama" => $request->nama,
      "description" => $request->description,
      "icon" => $request->icon,
      "badge" => $request->badge,
    ]);
    Alert::success('Berhasil diedit', '');
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

    return back();
  }
}