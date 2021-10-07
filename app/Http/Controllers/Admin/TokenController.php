<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TokenRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Token;
use App\Models\User;

class TokenController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $tokens = Token::latest()->get();
    $users = User::all();
    return view('admin.token.index', compact('tokens', 'users'));
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
  public function store(TokenRequest $request) {
    if ($request->type == "silver") {
      $expired_at = time() + (86400 * (30*1));
    } elseif ($request->type == "gold") {
      $expired_at = time() + (86400 * (30*3));
    } elseif ($request->type == "platinum") {
      $expired_at = time() + (86400 * (30*6));
    }

    Token::create([
      'token' => $request->token,
      'type' => $request->type,
      "user_id" => $request->user,
      "expired_at" => date("Y-m-d H:i:s", $expired_at)
    ]);

    Alert::success('Berhasil Menambahkan Token', 'Token baru telah ditambahkan');
    return back();
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
  public function update(Request $request,
    $id) {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Token::find($id)->delete();

    Alert::error('Berhasil dihapus', 'Token telah terhapus');
    return back();
  }
}