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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Product name
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->foreignId('temple_id')->nullable()->constrained()->onDelete('set null');
            $table->string('location')->nullable(); 
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('quantity')->default(0);
            $table->string('image')->nullable(); // single product image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
