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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('pandit_id')->constrained()->onDelete('cascade');
            $table->string('ceremony_type');
            $table->dateTime('ceremony_date');
            $table->string('location');
            $table->text('special_requests')->nullable();
            $table->string('status')->default('pending'); // e.g., pending, confirmed, completed, canceled
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('payment_status')->default('pending'); // e.g., pending, paid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
