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
        Schema::table('minor_operating_systems', function (Blueprint $table) {
            $table->string('about_update_url')->nullable()->after('release_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('minor_operating_systems', function (Blueprint $table) {
            $table->dropColumn('about_update_url');
        });
    }
};
