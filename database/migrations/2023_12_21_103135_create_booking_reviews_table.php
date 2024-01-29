<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookings_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('locker_id');
            $table->integer('rate');
            $table->string('user_review');
            $table->string('view_status');
            $table->string('status');
            $table->timestamps();



            $table->foreign('locker_id')->references('id')->on('lockers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bookings_id')->references('id')->on('booking_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_review');
    }
};
