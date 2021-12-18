<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlogs', function (Blueprint $table) {
            $table->id();
            $table->string('vlog_name');
            $table->text('vlog_description');
            $table->text('vlog_video_url');
            $table->bigInteger('vlog_views');
            $table->boolean('vlog_status');
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
        Schema::dropIfExists('vlogs');
    }
}
