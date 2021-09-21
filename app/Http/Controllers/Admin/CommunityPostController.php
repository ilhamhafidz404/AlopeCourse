<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityPost;
use RealRashid\SweetAlert\Facades\Alert;
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    CommunityPost::find($id)->delete();

    Alert::warning('Berhasil Dihapus', 'Community baru telah dicopot dari Mading');
    return back();
  }
}