<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTagTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('category_tag', function (Blueprint $table) {
      $table->id();
      $table->foreignId('category_id');
      $table->foreignId('tag_id');

      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
      $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down() {
    Schema::dropIfExists('category_tag');
  }
}