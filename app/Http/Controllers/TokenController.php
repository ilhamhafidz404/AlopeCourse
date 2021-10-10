<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Notification;

class TokenController extends Controller
{
  /**
  * Handle the incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function redeem() {
    return view('user.more.redeem');
  }

  public function getPremium(Request $request) {
    $tokenInput = $request->token;
    $token = Token::whereToken($tokenInput)->first();
    if ($token) {
      if ($token->user_id == auth()->user()->id) {
        Alert::toast('Anda sedang di Paket Premium', 'warning');
        return back();
      } else {
        if ($token->user_id == 0) {
          $user = User::find(auth()->user()->id);
          $user->syncRoles('premium');
          $token_type = $token->type;
          if ($token_type == 'silver') {
            $expired_at = time() + (86400 * (30*1));
          } elseif ($token_type == "gold") {
            $expired_at = time() + (86400 * (30*3));
          } elseif ($token_type == "platinum") {
            $expired_at = time() + (86400 * (30*6));
          }
          $token->update([
            'user_id' => auth()->user()->id,
            'isOrder' => false,
            "expired_at" => date("Y-m-d H:i:s", $expired_at)
          ]);
          Notification::create([
            "user_id" => auth()->user()->id,
            "subject" => "Menjadi member Premium",
            "message" => "menjadi member premium ".$token->type." sampai ".$token->expired_at
          ]);
          Alert::toast('Anda Sekarang Premium', 'success');
          return back();
        }
        Alert::toast('Token sudah terpakai', 'error');
        return back();
      }
    }
    Alert::toast('Token tidak tersedia', 'error');
    return back();
  }
}