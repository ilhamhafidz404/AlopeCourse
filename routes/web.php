<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\TrashController;

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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard.main');

route::resource('/dashboard/blog', BlogController::class);

route::resource('/beranda', BerandaController::class);
route::get("/dashboard/trash", [TrashController::class, "index"]);
route::delete("/dashboard/trash", [TrashController::class, 'destroy'])->name("trash.destroy");