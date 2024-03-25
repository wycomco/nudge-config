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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->foreignId('parent_configuration')->nullable()->references('id')->on('configurations')->nullOnDelete();
            $table->foreignId('max_major_operating_system')->nullable()->references('id')->on('major_operating_systems')->nullable()->nullOnDelete();
            $table->integer('major_update_deferral_days')->nullable()->default(null);
            $table->integer('minor_update_deferral_days')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
