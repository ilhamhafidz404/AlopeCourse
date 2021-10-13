<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Like;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($username) {
    $user = User::whereUsername($username)->first();
    $biodata = Biodata::whereUser_id($user->id)->first();
    $like = Like::whereUser_id($user->id)->count();
    return view('user.more.user-profile', compact('user', 'biodata', 'like'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    //
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
  public function edit($username) {
    $user = User::whereUsername($username)->first();
    return view('user.more.edit-biodata', compact('user'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    Biodata::whereUser_id($id)->update([
      'about' => $request->about,
      'job' => $request->job,
      'from' => $request->from,
      'website' => $request->website,
      'github' => $request->github,
      'facebook' => $request->facebook,
      'twitter' => $request->twitter,
      'instagram' => $request->instagram,
    ]);
    User::find($id)->update([
      'name' => $request->name,
      'username' => $request->username,
    ]);

    if ($request->profile != auth()->user()->id) {
      $request->validate([
        'profile' => ['image', 'dimensions:max_width=1000,max_height=1000,ratio:1/1']
      ]);

      $profile = time().".".$request->profile->extension();
      $request->file('profile')->storeAs('public/profile', $profile);
      if (auth()->user()->profile == 'user.jpg') {
        User::find($id)->update([
          'profile' => $profile
        ]);
      } else {
        \File::delete('storage/profile/'.auth()->user()->profile);
        User::find($id)->update([
          'profile' => $profile
        ]);
      }
    }

    Alert::toast('Profile telah terupdate', 'success');
    return redirect()->route('profile.edit', $request->username);
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