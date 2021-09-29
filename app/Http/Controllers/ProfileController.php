<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
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
    return view('user.more.user-profile', compact('user', 'biodata'));
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
      'website' => $request->github,
      'facebook' => $request->facebook,
      'twitter' => $request->twitter,
      'instagram' => $request->instagram,
    ]);

    Alert::toast('Profile telah terupdate', 'success');
    return back();
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