<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityPost;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Http\Requests\CommunityPostRequest;

class CommunityPostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $posts = CommunityPost::latest()->get();

    return view('admin.post.community-post', compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('admin.post.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CommunityPostRequest $request) {
    if (!$request->banner) {
      return back()->with('banner_error', 'Banner Harus diUpload, Harap Isi Data Kembali');
    }
    $banner = time().".".$request->banner->extension();
    $request->file('banner')->storeAs('public/community-post', $banner);
    CommunityPost::create([
      'banner' => $banner,
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'content' => $request->content
    ]);

    Alert::success('Berhasil Diupload', 'Community baru telah dipasang di Mading');
    return redirect(route('community-post.index'));
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
    $post = CommunityPost::whereSlug($slug)->first();

    return view('admin.post.edit', compact('post'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(CommunityPostRequest $request, $id) {
    if (!$request->banner) {
      return back()->with('banner_error', 'Banner harus diupload, Silahkan isi data kembali');
    }
    $post = CommunityPost::find($id)->first();
    \File::delete('storage/community-post/'.$post->banner);

    $banner = time().".".$request->banner->extension();
    $request->file('banner')->storeAs('public/community-post', $banner);
    CommunityPost::find($id)->update([
      'title' => $request->title,
      'slug' => Str::slug($request->title),
      'banner' => $banner,
      'content' => $request->content
    ]);

    return redirect(route('community-post.index'));

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    $post = CommunityPost::find($id);
    \File::delete('storage/community-post/'. $post->banner);
    $post->delete();

    Alert::warning('Berhasil Dihapus', 'Community baru telah dicopot dari Mading');
    return back();
  }
}