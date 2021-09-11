<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::create('blogs', function (Blueprint $table) {
      $table->id();
      $table->string('thumbnail');
      $table->string('judul');
      $table->foreignId('category_id');
      $table->foreignId('user_id')->default(1);
        $table->longText('content');
        $table->string("status")->default("upload");
          $table->enum("access", ["active", "premium"])->default("active");
            $table->timestamps();
          });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down() {
        Schema::dropIfExists('blogs');
      }
    }