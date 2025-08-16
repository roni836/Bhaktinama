<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::table('services', function (Blueprint $table) {
        $table->text('description')->nullable()->change();
        // Ya default value ke saath:
        // $table->text('description')->default('')->change();
    });
}

public function down()
{
    Schema::table('services', function (Blueprint $table) {
        $table->text('description')->nullable(false)->change();
    });
}

};
