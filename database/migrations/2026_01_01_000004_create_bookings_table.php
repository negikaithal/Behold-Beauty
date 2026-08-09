<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('email');
            $table->string('service_category');
            $table->string('specific_service');
            $table->date('preferred_date');
            $table->string('preferred_time');
            $table->integer('number_of_people')->default(1);
            $table->text('message')->nullable();
            $table->string('status')->default('Pending'); // Pending, Confirmed, Completed, Cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
