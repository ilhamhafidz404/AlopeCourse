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
  public function index() {
    $tokens = Token::latest()->get();
    $users = User::all();
    return view('admin.token.index', compact('tokens', 'users'));
  }

  public function give(Request $request) {
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

  public function destroy($id) {
    $token =Token::find($id);
    // Cek apakah token dipakai oleh user atau tidak
    if($token->user_id > 0 || $token->isOrder){
      Alert::error('Token Sedang Digunakan', 'Jangan coba-coba menghapus token active atau yang ter-order');
      return back();
    }
    $token->delete();
    Alert::success('Berhasil dihapus', 'Token telah terhapus');
    return back();
  }
}