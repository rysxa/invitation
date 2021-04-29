<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date_wedding');
            $table->string('address');
            $table->string('city');
            $table->longText('caption');
            $table->string('user_man');
            $table->string('pic_man');
            $table->longText('caption_man');
            $table->string('user_women');
            $table->string('pic_women');
            $table->longText('caption_women');
            $table->date('ceremony_date');
            $table->time('ceremony_time_start');
            $table->time('ceremony_time_end');
            $table->longText('ceremony_caption');
            $table->date('party_date');
            $table->time('party_time_start');
            $table->time('party_time_end');
            $table->longText('party_caption');
            $table->integer('status');
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
        Schema::dropIfExists('events');
    }
}
