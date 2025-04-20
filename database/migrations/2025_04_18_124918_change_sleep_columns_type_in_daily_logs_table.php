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
        Schema::table('daily-logs', function (Blueprint $table) {
            Schema::table('daily-logs', function (Blueprint $table) {
                $table->time('sleep_start')->nullable()->change();
                $table->time('sleep_end')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daily-logs', function (Blueprint $table) {
            Schema::table('daily-logs', function (Blueprint $table) {
                $table->dateTime('sleep_start')->nullable()->change();
                $table->dateTime('sleep_end')->nullable()->change();
            });
        });
    }
};
