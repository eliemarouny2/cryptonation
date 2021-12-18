<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcomments', function (Blueprint $table) {
            $table->id();
            $table->integer('vlog_id');
            $table->text('comment');
            $table->text('image_url');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('parentcomment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vcomments');
    }
}
