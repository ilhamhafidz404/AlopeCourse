<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogDraffController extends Controller
{
  public function __invoke() {
    $blogs = Blog::where('status', "pending")->paginate(10);
    return view("dashboard");
  }
}