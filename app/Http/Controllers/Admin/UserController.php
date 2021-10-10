<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $users = User::all();
    $tokens = Token::whereUser_id(0)->where('isOrder', false)->get();
    return view('admin.user.index', compact('users', 'tokens'));
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
    if ($request->status == 'banned') {
      User::find($id)->update([
        'status' => $request->status
      ]);

      User::find($id)->syncRoles('banned');
      Alert::error('User Di Banned', 'User sekarang tidak bisa login');
    } else if ($request->status == "active") {
      User::find($id)->update([
        'status' => $request->status
      ]);

      User::find($id)->syncRoles('active');
      Alert::success('User Diaktifkan', 'User sekarang bisa login kembali');
    }

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