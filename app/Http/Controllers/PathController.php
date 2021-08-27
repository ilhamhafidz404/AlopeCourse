<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class PathController extends Controller
{
    public function __invoke(){
        $series= Category::all();
        return view('beranda.tag', compact('series'));
    }
}
