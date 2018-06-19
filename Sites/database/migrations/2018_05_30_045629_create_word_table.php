<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->text('word'); //言語
            $table->text('form'); //品詞
        });

        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id'); //関係のID
            $table->integer('word_id'); //もとの言葉のID
            $table->text('word');
            $table->text('form');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word');
        Schema::dropIfExists('relation');
    }
}
