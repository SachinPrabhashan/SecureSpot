<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('booking_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bookings_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('locker_id');
            $table->string('reference_no');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('locker_id')->references('id')->on('lockers');
            $table->foreign('bookings_id')->references('id')->on('bookings');
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_histories');
    }
};
