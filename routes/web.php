<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', WelcomeController::class);

Route::middleware(['role:admin', 'auth'])->group(function () {
  Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.main');
  route::resource('/admin/series', CategoryController::class);
  route::resource('/admin/users', UserController::class);
  route::resource('/admin/blog', BlogController::class);
  route::resource('/admin/tag', TagController::class);
  route::resource('/admin/video', VideoController::class);
  route::get("/admin/trash", [TrashController::class, "index"])->name('trash.index');
  route::delete("/admin/trash", [TrashController::class, 'destroy'])->name("trash.destroy");
});

Route::middleware(['auth'])->group(function () {
  route::get('/beranda', BerandaController::class)->name('beranda');
  route::get('/topic', [TopicController::class, 'index'])->name('topic');
  route::get('/topic/{slug}', [TopicController::class, 'show'])->name('topic.show');
});

Auth::routes();


//Route::get('/login', function () {
//  return view('auth.login');
//});
//Route::get('/register', function () {
//  return view('auth.register');
//});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');