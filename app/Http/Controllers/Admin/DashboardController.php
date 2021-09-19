<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function __invoke() {
    $blogData = Blog::select('id', 'created_at')->get()->groupBy(function($blogData) {
      return Carbon::parse($blogData->created_at)->format('M');
    });
    $blogMonths = [];
    $blogMonthCount = [];
    foreach ($blogData as $month => $values) {
      $blogMonths[] = $month;
      $blogMonthCount[] = count($values);
    }

    $serieData = Category::select('id', 'created_at')->get()->groupBy(function($serieData) {
      return Carbon::parse($serieData->created_at)->format('M');
    });
    $serieMonths = [];
    $serieMonthCount = [];
    foreach ($serieData as $month => $values) {
      $serieMonths[] = $month;
      $serieMonthCount[] = count($values);
    }
    $video = Video::latest()->take(1)->first();
    $blogCount = Blog::count();
    $serieCount = Category::count();
    $tagCount = Tag::count();
    $userCount = User::count();
    $draffBlogList = Blog::whereStatus("draff")->orderBy("id", "DESC")->take(5)->get();
    $draffBlogCount = Blog::whereStatus("draff")->count();
    return view('admin.dashboard', compact("draffBlogList", "draffBlogCount", 'blogCount', 'serieCount', 'tagCount', 'video', 'userCount', 'blogMonths', 'blogMonthCount', 'serieMonths', 'serieMonthCount'));
  }
}