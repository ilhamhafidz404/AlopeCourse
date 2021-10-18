<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use RealRashid\SweetAlert\Facades\Alert;

class BannedBlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        Blog::find($id)->update([
            "status" => 'banned'
        ]);
        Alert::warning('Blog Di Banned', 'Blog tidak akan terlihat oleh user');
        return back();
    }
}
