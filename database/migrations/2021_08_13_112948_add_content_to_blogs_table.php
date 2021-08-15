<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContentToBlogsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up() {
    Schema::table('blogs', function (Blueprint $table) {
      $table->string("status")->default("upload")->after('content');
      });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down() {
      Schema::table('blogs', function (Blueprint $table) {
        //
      });
    }
  }