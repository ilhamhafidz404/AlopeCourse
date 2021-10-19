<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Notification;

class TokenController extends Controller
{
  public function redeem() {
    return view('user.more.redeem');
  }

  public function getPremium(Request $request) {
    // ambil inputan user
    $tokenInput = $request->token;
    // chek apakah token yang user inputkan sesuai dengan token yang ada
    $token = Token::whereToken($tokenInput)->first();
    if ($token) {
      // Cek apakah user sudah premium atau sedang menggunkan salah satu token
      if (Token::whereUserId(auth()->user()->id)->first()) {
        Alert::toast('Anda sedang di Paket Premium', 'warning');
        return back();
      } else {
        // jka tidak, cek apakah token yang user inputkan itu dimiliki user lain
        if ($token->user_id == 0) {
          // Ganti Role user
          $user = User::find(auth()->user()->id);
          $user->syncRoles('premium');
          // Menemtukan expire dari token
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