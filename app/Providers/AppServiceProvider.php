<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
  /**
  * Register any application services.
  *
  * @return void
  */
  public function register() {
    //
  }

  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot(Charts $charts) {
    Paginator::useBootstrap();
    Schema::defaultStringLength(191);
    $charts->register([
      \App\Charts\BlogChart::class
    ]);
  }
}