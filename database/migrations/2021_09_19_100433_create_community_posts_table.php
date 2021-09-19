<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityPostsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('community_posts', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('content');
      $table->string('banner')->default('default.jpg');
        $table->timestamps();
      });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down() {
      Schema::dropIfExists('community_posts');
    }
  }