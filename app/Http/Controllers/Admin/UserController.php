<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
  public function index() {
    $users = User::all();
    $tokens = Token::whereUser_id(0)->where('isOrder', false)->get();
    return view('admin.user.index', compact('users', 'tokens'));
  }

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
}