<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Token;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
{
  public function __invoke(Request $request) {
    // ambil user dan token yang dipilih
    $user = User::whereUsername($request->user)->first();
    $token = Token::find($request->token);
    // kalau token udh diorder maka halangi pemberian token kepada user tujuan
    if($token->isOrder){
      Alert::warning("Token ini sudah di Order");
      return back();
    }
    // Message::create([
    //   "user_id" => $user->id,
    //   "subject" => "Terimakasih telah membeli pake Premium kami",
    //   "message" => "Silahkan Reedem tokennya segera dan dapatkan palet premium agar proses belajarmu semakin menyenangkan. Kode tokenmu adalah ".$token->token
    // ]);
    $token->update([
      "isOrder" => true
    ]);

    alert()->html('Token berhasil diorder',
                "
                  <a href='mailto:".$user->email."?subject= ALOPE REDEEM ACCESS&body=Halo ". $user->username." Terimakasih sudah membeli Acces Premium dari ALOPE, Kami sangat senang sekarang kamu menjadi bagian dari kami. Tetap dukung kami untuk lebih berkembang lagi yak :) Ini adalah reedem code untuk Premium Acces kamu : ". $token->token.". Semoga harimu menyenangkan:)'>Hubungi User</a>
                ",
                'success');
    return back();
  }
}