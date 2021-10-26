<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class MessageComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $messages= 'Login untuk berinteraksi';
        if(Auth::check()){
            $messages= Message::whereUserId(auth()->user()->id)->latest()->get();
        }
        return view('components.message-component', compact('messages'));
    }
}
