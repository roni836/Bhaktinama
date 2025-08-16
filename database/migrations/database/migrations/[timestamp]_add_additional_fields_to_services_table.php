<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('services', 'introduction')) {
                $table->text('introduction')->nullable()->after('short_description');
            }
            if (!Schema::hasColumn('services', 'importance')) {
                $table->text('importance')->nullable()->after('introduction');
            }
            if (!Schema::hasColumn('services', 'traditions')) {
                $table->text('traditions')->nullable()->after('importance');
            }
            if (!Schema::hasColumn('services', 'service_type')) {
                $table->string('service_type')->nullable()->after('category');
            }
            if (!Schema::hasColumn('services', 'images')) {
                $table->json('images')->nullable()->after('image');
            }
            if (!Schema::hasColumn('services', 'packages')) {
                $table->json('packages')->nullable()->after('price');
            }
            if (!Schema::hasColumn('services', 'faqs')) {
                $table->json('faqs')->nullable()->after('packages');
            }
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['introduction', 'importance', 'traditions', 'service_type', 'images', 'packages', 'faqs']);
        });
    }
};