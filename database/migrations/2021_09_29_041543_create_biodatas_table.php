<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('biodatas', function (Blueprint $table) {
      $table->id();
      $table->foreignId("user_id");
      $table->string('job')->nullable();
      $table->text('about')->nullable();
      $table->string('from')->nullable();
      $table->string('website')->nullable();
      $table->string('github')->nullable();
      $table->string('instagram')->nullable();
      $table->string('twitter')->nullable();
      $table->string('facebook')->nullable();
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down() {
    Schema::dropIfExists('biodatas');
  }
}