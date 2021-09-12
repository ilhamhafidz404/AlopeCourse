<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class TrashController extends Controller
{
  public function index() {
    $blogs = Blog::whereStatus("reject")->get();
    return view('admin.trash', compact("blogs"));
  }
  public function destroy() {
    Blog::whereStatus("reject")->delete();
    return back();
  }
}