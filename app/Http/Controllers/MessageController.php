<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Like;

class MessageController extends Controller
{
  public function index() {
    $messages = Message::whereUserId(auth()->user()->id)->latest()->paginate(4);
    $messageCount = Message::whereUserId(auth()->user()->id)->count();
    $user = User::whereId(auth()->user()->id)->first();
    $like = Like::whereUserId(auth()->user()->id)->first();
    return view('user.more.messages', compact('messages', 'messageCount', 'user', 'like'));
  }
}