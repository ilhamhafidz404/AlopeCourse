<?php

namespace App\Http\Livewire\View;

use Livewire\Component;
use App\Models\{Blog, Category};

class BerandaLivewire extends Component
{
    public function render()
    {
        $blogs = Blog::with(['category','user'])->latest()->take(7)->get();
        $series = Category::latest()->get()->load('tag');
        return view('livewire.view.beranda-livewire', compact('blogs', 'series'))->extends('user.master')->section('content');
    }
}
