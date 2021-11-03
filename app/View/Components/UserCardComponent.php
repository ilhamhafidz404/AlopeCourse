<?php

namespace App\View\Components;

use App\Models\{User, Like};
use Illuminate\View\Component;

class UserCardComponent extends Component
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
        $user = User::whereUsername(auth()->user()->username)->first();
        $like = Like::whereUser_id($user->id)->count();
        return view('components.user-card-component', compact('user', 'like'));
    }
}
