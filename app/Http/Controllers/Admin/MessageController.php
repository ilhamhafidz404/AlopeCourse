<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Token;
use Alert;

class MessageController extends Controller
{
  public function __invoke(Request $request) {
    $user = User::whereUsername($request->user)->first();
    $token = Token::find($request->token);

    $subject= "Terimakasih telah membeli pake Premium kami";

    if($request->gift){
      $subject= "Kami punya hadiah nih buat kamu";
    }
    Message::create([
      "user_id" => $user->id,
      "subject" => $subject,
      "message" => "Silahkan Reedem tokennya segera dan dapatkan palet premium agar proses belajarmu semakin menyenangkan. Kode tokenmu adalah ".$token->token
    ]);
    $token->update([
      "isOrder" => true
    ]);

    Alert::success("Berhasil mengirim pesan");
    return back();
  }
}