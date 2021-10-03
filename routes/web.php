<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BlogSyntaxController;
use App\Http\Controllers\Admin\TokenController as AdminTokenController;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BlogController as UserBlogController;
use App\Http\Controllers\VideoController as UserVideoController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TokenController as UserTokenController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;

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

Route::middleware(['role:admin', 'auth'])->group(function () {
  Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.admin');
  route::resource('/admin/series', CategoryController::class);
  route::resource('/admin/users', UserController::class);
  route::resource('/admin/blog', BlogController::class);
  route::get('/admin/blsyntax', [BlogSyntaxController::class, 'index'])->name('syntax.index');
  route::get('/admin/blsyntax/{slug}/add', [BlogSyntaxController::class, 'add'])->name('syntax.add');
  route::put('/admin/blsyntax/{syntax}', [BlogSyntaxController::class, 'save'])->name('syntax.save');
  route::resource('/admin/tag', TagController::class);
  route::resource('/admin/video', VideoController::class);
  route::resource('/admin/token', AdminTokenController::class);
});

Route::middleware(['role:active|premium|admin', 'auth'])->group(function () {
  route::get('/serie', [SerieController::class, 'index'])->name('serie.index');
  route::get('/serie/{slug}', [SerieController::class, 'show'])->name('serie.show');

  Route::get('/blog', [UserBlogController::class, 'list'])->name('blog.list');
  Route::get('/blog/{slug}', [UserBlogController::class, 'read'])->name('blog.read');

  Route::get('/video/{slug}', [UserVideoController::class, 'stream'])->name('video.stream');
  Route::get('/video', [UserVideoController::class, 'index'])->name('list.video.tutor');

  route::get('/topic', [TopicController::class, 'index'])->name('topic');

  route::get('/like/{blog_id}', LikeController::class)->name('like.blog');

  route::get('/reedem-token', [UserTokenController::class, 'redeem'])->name('redeem');
  route::post('/token', [UserTokenController::class, 'getPremium'])->name('getPremium');

  route::get('/u/{profile}', [ProfileController::class, 'index'])->name('profile.index');

  route::get('/u/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
  route::put('/u/{profile}', [ProfileController::class, 'update'])->name('profile.update');
});

Auth::routes();