<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipcodesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('zipcodes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('jiscode');
      $table->string('zipcode_old');
      $table->string('zipcode');
      $table->string('pref_kana');
      $table->string('city_kana');
      $table->string('street_kana');
      $table->string('pref');
      $table->string('city');
      $table->string('street');
      $table->string('flag1');
      $table->string('flag2');
      $table->string('flag3');
      $table->string('flag4');
      $table->string('flag5');
      $table->string('flag6');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('zipcodes');
  }
}

