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
        Schema::create('minor_operating_systems', function (Blueprint $table) {
            $table->id();
            $table->string('version')->unique();
            $table->foreignId('major_operating_system_id')->references('id')->on('major_operating_systems')->cascadeOnDelete();
            $table->date('release_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minor_operating_systems');
    }
};
