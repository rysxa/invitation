<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryCaptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_captions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slug_id')->unsigned();
            $table->string('head_picture')->nullable();
            $table->string('head_story');
            $table->string('head_gallery');
            $table->string('head_video')->nullable();
            $table->string('url_video')->nullable();
            $table->timestamps();

            $table->foreign('slug_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_captions');
    }
}
