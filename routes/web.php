<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BlogSyntaxController;
use App\Http\Controllers\Admin\BannedBlogController;
use App\Http\Controllers\Admin\TokenController as AdminTokenController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BlogController as UserBlogController;
use App\Http\Controllers\VideoController as UserVideoController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TokenController as UserTokenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Auth\ChangePassword;


use App\Models\Notification;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', BerandaController::class)->name('beranda');

// Khusus untuk admin
Route::middleware(['role:admin', 'auth'])->group(function () {
  Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.admin');
  Route::resource('/admin/series', CategoryController::class);
  Route::resource('/admin/users', UserController::class);
  Route::resource('/admin/tag', TagController::class);
  Route::resource('/admin/video', VideoController::class);
  Route::resource('/admin/token', AdminTokenController::class);
  Route::get('/admin/messagetoken', AdminMessageController::class)->name('token.message');

  // Route Khusus Blog
  Route::resource('/admin/blog', BlogController::class);
  Route::get('/admin/blsyntax', [BlogSyntaxController::class, 'index'])->name('syntax.index');
  Route::get('/admin/blsyntax/{slug}/add', [BlogSyntaxController::class, 'add'])->name('syntax.add');
  Route::put('/admin/blsyntax/{syntax}', [BlogSyntaxController::class, 'save'])->name('syntax.save');
  Route::put('/admin/banblog/{id}', BannedBlogController::class)->name('blog.banned');
});

Route::middleware(['role:active|premium|admin', 'auth'])->group(function () {
  Route::get('/serie', [SerieController::class, 'index'])->name('serie.index');
  Route::get('/serie/{slug}', [SerieController::class, 'show'])->name('serie.show');
  Route::get('/blog', [UserBlogController::class, 'list'])->name('blog.list');
  Route::get('/video', [UserVideoController::class, 'index'])->name('list.video.tutor');
  Route::get('/topic', TopicController::class)->name('topic');
  Route::get('/u/{profile}', [ProfileController::class, 'index'])->name('profile.index');
  Route::get('/u/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::put('/u/{profile}', [ProfileController::class, 'update'])->name('profile.update');
  Route::get('/iam_out', function() {
    User::whereId(auth()->user()->id)->delete();
    Notification::whereUserId(auth()->user()->id)->delete();
    return redirect()->route('beranda');
  })->name('iam_out');

  //Route yang harus Verifikasi Dulu
  Route::middleware(['verified', 'auth'])->group(function() {
    Route::get('/blog/{slug}', [UserBlogController::class, 'read'])->name('blog.read');
    Route::get('/video/{slug}', [UserVideoController::class, 'stream'])->name('video.stream');
    Route::get('/like/{blog_id}', LikeController::class)->name('like.blog');
    Route::get('/reedem-token', [UserTokenController::class, 'redeem'])->name('redeem');
    Route::post('/token', [UserTokenController::class, 'getPremium'])->name('getPremium');
    Route::get('/invoice', function() {
      return view('user.more.invoice');
    })->name('invoice');

    Route::get('/touch-admin', function() {
      Notification::create([
        "user_id" => auth()->user()->id,
        "subject" => auth()->user()->username." Mencolek anda",
        "message" => auth()->user()->username." telah mengclaim dirinya telah membayar untuk berlangganan, ayo cek!"
      ]);
      return redirect("https://api.whatsapp.com/send?phone=6283871352030&text=Hai%20Saya%20Ingin%20Berlangganan%20di%20ALOPE");
    })->name('touch-admin');
  });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes(["verify" => true]);
Route::get('account/changepassword', [ChangePassword::class, 'edit'])->name('changepassword');
Route::put('account/changepassword', [ChangePassword::class, 'update'])->name('password.change');