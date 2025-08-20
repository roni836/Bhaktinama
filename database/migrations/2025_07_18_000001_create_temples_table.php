<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->text('overall_description')->nullable();
            $table->string('location')->nullable();
            $table->text('visiting_info')->nullable();
            $table->text('facilities')->nullable();
            $table->json('images')->nullable(); // store array of image paths
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temples');
    }
};
