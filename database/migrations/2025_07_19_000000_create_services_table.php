<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('service_category_id')->constrained('service_categories')->onDelete('cascade');
            $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->longText('description');
            $table->text('short_description')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('significance')->nullable();
            $table->longText('facilities')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->string('service_type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_trending')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
