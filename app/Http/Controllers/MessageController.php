<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
  public function index() {
    $messages = Message::whereUserId(auth()->user()->id)->latest()->paginate(4);
    $messageCount = Message::whereUserId(auth()->user()->id)->count();
    return view('user.more.messages', compact('messages', 'messageCount'));
  }
}