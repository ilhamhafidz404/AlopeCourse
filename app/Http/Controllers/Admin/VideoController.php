<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;

class VideoController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $videos = Video::latest()->paginate(10);
    $categories = Category::all();
    return view('admin.video.index', compact('videos', 'categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    $categories = Category::all();
    return view('admin.video.create', compact('categories'));
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
    Video::create([
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'category_id' => $request->category,
      'link' => $request->link,
      'description' => $request->description,
      'thumbnail' => $thumbnail,
      'episode' => $request->episode,
      'duration' => $request->duration,
    ]);

    Alert::success('Video Tutorial Baru Berhasil Ditambahkan', 'User bisa melihat video baru ini');
    return redirect(route('video.index'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Video $video) {
    $videos = Video::whereCategory_id($video->category_id->all());
    // $video = Video::whereSlug($slug)->first();
    return view('admin.video.show', compact('video', 'videos'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($slug) {
    $video = Video::whereSlug($slug)->first();
    $categories = Category::all();
    return view('admin.video.edit', compact('video', 'categories'));
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

    Video::find($id)->update([
      "title" => $request->title,
      'slug' => Str::slug($request->title),
      "category_id" => $request->category,
      "description" => $request->description,
      "link" => $request->link,
      "thumbnail" => $thumbnail,
      "episode" => $request->episode,
      "duration" => $request->duration
    ]);

    Alert::success('Vide berhasil Diedit', 'Data video berhasil diubah');
    return redirect(route('video.index'));
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