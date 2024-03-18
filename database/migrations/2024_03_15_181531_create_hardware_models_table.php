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
        Schema::create('hardware_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model_identifier');
            $table->foreignId('max_major_operating_system')->nullable()->references('id')->on('major_operating_systems')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_models');
    }
};
