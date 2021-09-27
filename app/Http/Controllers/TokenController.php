<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class TokenController extends Controller
{
  /**
  * Handle the incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function __invoke(Request $request) {
    $tokenInput = $request->token;
    $token = Token::whereToken($tokenInput)->first();
    if ($token) {
      if ($token->user_id == 0) {
        $user = User::find(auth()->user()->id);
        $user->syncRoles('premium');
        $token->update([
          'user_id' => auth()->user()->id
        ]);
        Alert::toast('Anda Sekarang Premium', 'success');
        return back();
      }
      Alert::toast('Token sudah terpakai', 'error');
      return back();
    }
    Alert::toast('Token tidak tersedia', 'error');
    return back();
  }
}