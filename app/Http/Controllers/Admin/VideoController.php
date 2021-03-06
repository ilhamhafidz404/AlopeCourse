<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;

class VideoController extends Controller
{
  public function index() {
    $videos = Video::with('category')->latest()->paginate(10);
    return view('admin.video.index', compact('videos'));
  }

  public function create() {
    $categories = Category::all();
    return view('admin.video.create', compact('categories'));
  }

  public function store(VideoRequest $request) {
    if (!$request->thumbnail) {
      return back()->with('thumb_error', 'Thumbnail anda kosong, mohon untuk mengulang input data kembali');
    }
    $ispremium = false;
    if ($request->premium) {
      $ispremium = true;
    }
    $thumbnail = time().".".$request->thumbnail->extension();
    $request->file('thumbnail')->storeAs('public/thumbnail/video', $thumbnail);
    Video::create([
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'category_id' => $request->category,
      'link' => $request->link,
      'description' => $request->description,
      'thumbnail' => $thumbnail,
      'episode' => $request->episode,
      'duration' => $request->duration,
      'isPremium' => $ispremium
    ]);

    Alert::success('Video Tutorial Baru Berhasil Ditambahkan', 'User bisa melihat video baru ini');
    return redirect(route('video.index'));
  }

  public function show(Video $video) {
    //$videos = Video::whereCategory_id($video->category_id->all());
    // $video = Video::whereSlug($slug)->first();
    $videos = Video::whereCategory_id($video->category_id)->get();
    $category = Category::whereId($video->category_id)->first();
    $next = Video::whereCategory_id($category->id +1)->pluck('slug')->first();
    $prev = Video::whereCategory_id($category->id -1)->pluck('slug')->first();
    return view('admin.video.show', compact('video', 'videos', 'next', 'prev'));
  }

  public function edit($slug) {
    $video = Video::whereSlug($slug)->first();
    $categories = Category::all();
    return view('admin.video.edit', compact('video', 'categories'));
  }

  public function update(Request $request, $id) {
    $video = Video::find($id);
    if(!$request->thumbnail){
      $thumbnail= $video->thumbnail;
    } else{
      if($video->thumbnail != 'default.jpg'){
        \File::delete('storage/thumbnail/video/'.$video->thumbnail);
      }
      $thumbnail = time().".".$request->thumbnail->extension();
      $request->file('thumbnail')->storeAs('public/thumbnail/video', $thumbnail);
    }
    $isPremium= false;
    if($request->premium == 'true'){
      $isPremium= true;
    }
    $video->update([
      "title" => $request->title,
      'slug' => Str::slug($request->title),
      "category_id" => $request->category,
      "description" => $request->description,
      "link" => $request->link,
      "thumbnail" => $thumbnail,
      "episode" => $request->episode,
      "duration" => $request->duration,
      "isPremium" => $isPremium
    ]);

    Alert::success('Vide berhasil Diedit', 'Data video berhasil diubah');
    return redirect(route('video.index'));
  }

  public function destroy($id) {
    Video::find($id)-> delete();

    Alert::warning('Vide berhasil Dihapus');
    return back();
  }
}