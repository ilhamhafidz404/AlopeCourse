<?php

use Illuminate\Support\Facades\Route;
// ------------------------------- ADMIN CONTROLLER
use App\Http\Controllers\Admin\{DashboardController, BlogController, BlogSyntaxController, BannedBlogController, CategoryController, TagController, VideoController, UserController};
use App\Http\Controllers\Admin\TokenController as AdminTokenController;
use App\Http\Controllers\Admin\more\InvoiceController as AdminInvoiceController;


// ------------------------------- USER CONTROLLER
use App\Http\Controllers\BerandaController;
// pages controller
use App\Http\Controllers\{BlogController as UserBlogController, VideoController as UserVideoController, SerieController, TopicController};
// more controller
use App\Http\Controllers\{TokenController as UserTokenController, ProfileController, LikeController, InvoiceController};

use App\Http\Controllers\Auth\ChangePassword;
use App\Models\Notification;
use App\Models\User;

// Livewire
use App\Http\Livewire\View\BerandaLivewire;
use App\Http\Livewire\View\SerieLivewire;

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

Route::get('/', BerandaController::class)->name('beranda');
// Route::livewire('/', BerandaLivewire::class)->name('beranda');
// Route::livewire('/serie', SerieLivewire::class)->name('serie.index');


// ------------------------------ Khusus untuk admin
Route::middleware(['role:admin', 'auth'])->group(function () {
  Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.admin');
  Route::get('/admin/invoice', [AdminInvoiceController::class, 'index'])->name('admin.invoice');
  // Route::delete('/admin/invoice', [AdminInvoiceController::class, 'format'])->name('invoice.format');
  Route::resource('/admin/series', CategoryController::class);
  Route::resource('/admin/tag', TagController::class);
  Route::resource('/admin/video', VideoController::class);

  // Route Khusus User
  Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
  Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');

  
  // Route Khusus Token
  // Route::resource('/admin/token', AdminTokenController::class);
  Route::get('/admin/token', [AdminTokenController::class, 'index'])->name('token.index');
  // Route::post('/admin/token', [AdminTokenController::class, 'store'])->name('token.store');
  Route::delete('/admin/token/{id}', [AdminTokenController::class, 'destroy'])->name('token.destroy');
  Route::post('/admin/token/givetoken', [AdminTokenController::class, 'give'])->name('token.give');

  // Route Khusus Blog
  Route::resource('/admin/blog', BlogController::class);
  Route::get('/admin/blsyntax', [BlogSyntaxController::class, 'index'])->name('syntax.index');
  Route::get('/admin/blsyntax/{slug}/add', [BlogSyntaxController::class, 'add'])->name('syntax.add');
  Route::put('/admin/blsyntax/{syntax}', [BlogSyntaxController::class, 'save'])->name('syntax.save');
  Route::put('/admin/banblog/{id}', BannedBlogController::class)->name('blog.banned');
});



// ------------------------------ ALL USER
Route::middleware(['role:active|premium|admin', 'auth'])->group(function () {
  Route::get('/serie', [SerieController::class, 'index'])->name('serie.index');
  Route::get('/serie/{slug}', [SerieController::class, 'show'])->name('serie.show');
  Route::get('/blog', [UserBlogController::class, 'list'])->name('blog.list');
  Route::get('/video', [UserVideoController::class, 'index'])->name('list.video.tutor');
  Route::get('/topic', TopicController::class)->name('topic');

  // User Profile
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
    Route::get('account/changepassword', [ChangePassword::class, 'edit'])->name('changepassword');
    Route::put('account/changepassword', [ChangePassword::class, 'update'])->name('password.change');
    Route::get('/invoice', function() {
      return view('user.more.invoice');
    })->name('invoice');
    Route::post('/invoice', InvoiceController::class)->name('invoice.sent');

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
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('{any}', function () {
  return view('home');
})->where('any', '.*');
