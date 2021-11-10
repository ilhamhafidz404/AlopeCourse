<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Like;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  public function index($username) {
    $user = User::whereUsername($username)->first();
    $biodata = Biodata::whereUser_id($user->id)->first();
    $like = Like::whereUser_id($user->id)->count();
    return view('user.more.user-profile', compact('user', 'biodata', 'like'));
  }

  public function edit($username) {
    $user = User::whereUsername($username)->first();
    return view('user.more.edit-biodata', compact('user'));
  }

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

    $request->validate([
      'profileImg' => ['image', 'dimensions:max_width=1000,max_height=1000,ratio:1/1']
    ]);

    $user= User::find($id);
    if(!$request->profileImg){
      $profile= $user->profile;
    } else{
      if($user->profile != 'user.jpg'){
        \File::delete('storage/profile/'.auth()->user()->profile);
      }
      $profile = time().".".$request->profileImg->extension();
      $request->file('profileImg')->storeAs('public/profile', $profile);
    }
    User::find($id)->update([
      'profile' => $profile
    ]);

    Alert::toast('Profile telah terupdate', 'success');
    return redirect()->route('profile.edit', $request->username);
  }
}