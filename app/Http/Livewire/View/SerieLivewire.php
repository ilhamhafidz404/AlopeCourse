<?php

namespace App\Http\Livewire\View;

use Livewire\Component;
use App\Models\Category;

class SerieLivewire extends Component
{
    public function render()
    {
        $series = Category::all();
        return view('livewire.view.serie-livewire', compact('series'))->extends('user.master')->section('content');
    }
}
