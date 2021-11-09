<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TokenRequest;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class TokenController extends Controller
{
  public function index() {
    $tokens = Token::latest()->get();
    $users = User::all();
    return view('admin.token.index', compact('tokens', 'users'));
  }

  public function create() {
    //
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
    // Message::create([
    //   "user_id" => $request->user,
    //   "subject" => 'ALOPE baru saja menghadiahkan Token Premium padamu',
    //   "message" => "Sekarang kamu adalah user Premium, Ayo semangatkan lagi belajarmu dan segeralah tonton dan baca tutorial menarik dari kami dan upgrade skill mu."
    // ]);
    if($request->user > 0){
      User::find($request->user)->syncRoles('premium');
    }
    Alert::success('Token Baru Sudah Ditambahkan');
    return back();
  }

  public function show($id) {
    //
  }

  public function edit($id) {
    //
  }

  public function update(Request $request, $id) {
    //
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