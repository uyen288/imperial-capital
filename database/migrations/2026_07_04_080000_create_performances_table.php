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
        Schema::create('performances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')->constrained()->cascadeOnDelete();

            $table->date('date');
            $table->decimal('nav', 15, 2)->nullable();
            $table->decimal('one_month', 8, 2)->nullable();
            $table->decimal('three_month', 8, 2)->nullable();
            $table->decimal('one_year', 8, 2)->nullable();
            $table->decimal('three_year', 8, 2)->nullable();
            $table->decimal('ytd', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
