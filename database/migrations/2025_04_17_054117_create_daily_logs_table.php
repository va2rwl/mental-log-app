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
        Schema::create('daily-logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('log_date');
            $table->unsignedTinyInteger('mood');

            $table->time('sleep_start')->nullable();
            $table->time('sleep_end')->nullable();

            $table->boolean('meal_morning')->default(false);
            $table->boolean('meal_lunch')->default(false);
            $table->boolean('meal_dinner')->default(false);
            $table->boolean('meal_snack')->default(false);

            $table->text('activity')->nullable();
            $table->boolean('medication')->default(false);
            $table->text('journal')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily-logs');
    }
};
