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
        Schema::create('payments_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('receipt');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('booking_his_id');
            $table->date('date');
            $table->double('charge_amount')->nullable();
            $table->double('refund_amount')->nullable();
            $table->string('status');
            $table->string('refund_note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_his_id')->references('id')->on('booking_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_bookings');
    }
};
