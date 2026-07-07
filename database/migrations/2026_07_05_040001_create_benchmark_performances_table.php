<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tạo bảng benchmark_performances.
     * Lưu dữ liệu hiệu suất của từng benchmark theo từng kỳ performance.
     * Quan hệ: benchmark_performances -> benchmarks -> funds
     *                                 -> performances
     */
    public function up(): void
    {
        Schema::create('benchmark_performances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('benchmark_id')->constrained('benchmarks')->cascadeOnDelete();
            $table->foreignId('performance_id')->constrained('performances')->cascadeOnDelete();

            $table->decimal('nav', 15, 4)->nullable();
            $table->decimal('one_month', 8, 2)->nullable();
            $table->decimal('three_month', 8, 2)->nullable();
            $table->decimal('one_year', 8, 2)->nullable();
            $table->decimal('three_year', 8, 2)->nullable();
            $table->decimal('ytd', 8, 2)->nullable();

            $table->timestamps();

            // Mỗi benchmark chỉ có 1 dòng dữ liệu cho 1 kỳ performance
            $table->unique(['benchmark_id', 'performance_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benchmark_performances');
    }
};
