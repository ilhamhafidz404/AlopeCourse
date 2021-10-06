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
    //Chart Blog
    $blogData = Blog::select('id', 'created_at')->get()->groupBy(function($blogData) {
      return Carbon::parse($blogData->created_at)->format('M');
    });
    $blogMonths = [];
    $blogMonthCount = [];
    foreach ($blogData as $month => $values) {
      $blogMonths[] = $month;
      $blogMonthCount[] = count($values);
    }

    //Chart Video
    $videoData = Video::select('id', 'created_at')->get()->groupBy(function($videoData) {
      return Carbon::parse($videoData->created_at)->format('M');
    });
    $videoMonths = [];
    $videoMonthCount = [];
    foreach ($videoData as $month => $values) {
      $videoMonths[] = $month;
      $videoMonthCount[] = count($values);
    }

    $video = Video::latest()->take(1)->first();
    $tutorCount = Blog::count() + Video::count();

    $serieCount = Category::count();
    $tagCount = Tag::count();
    $userCount = User::count();
    $draffBlogList = Blog::whereStatus("draff")->orderBy("id", "DESC")->take(5)->get();
    $draffBlogCount = Blog::whereStatus("draff")->count();

    //enhance Blog
    $checkBulanSebelumnya = now()->format('m');
    $checkBulanSebelumnya = (int) $checkBulanSebelumnya;
    return view('admin.dashboard', compact("draffBlogList", "draffBlogCount", 'tutorCount', 'serieCount', 'tagCount', 'video', 'userCount', 'blogMonths', 'blogMonthCount', 'videoMonths', 'videoMonthCount'));
  }
}