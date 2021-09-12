<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\Premium\PostController as PremiumPostController;
//use App\Models\Post;

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
  route::resource('/admin/tag', TagController::class);
  route::resource('/admin/video', VideoController::class);
  route::resource('/admin/posts', AdminPostController::class);
  route::get("/admin/trash", [TrashController::class, "index"])->name('trash.index');
  route::delete("/admin/trash", [TrashController::class, 'destroy'])->name("trash.destroy");
});

Route::middleware(['role:premium', 'auth'])->group(function () {
  Route::view('/premium/dashboard', 'user.premium.dashboard')->name('dashboard.premium');
  route::resource('/premium/post', PremiumPostController::class);
});


Route::middleware(['role:active|premium|admin', 'auth'])->group(function () {
  route::get('/topic', [TopicController::class, 'index'])->name('topic');
  route::get('/serie', [SerieController::class, 'index'])->name('serie.index');
  route::get('/serie/{slug}', [SerieController::class, 'show'])->name('serie.show');
});

Auth::routes();