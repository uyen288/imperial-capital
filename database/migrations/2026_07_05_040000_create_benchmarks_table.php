<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Tạo bảng benchmarks.
     * Mỗi quỹ có thể có nhiều benchmark khác nhau (VN-Index, BTC, v.v.)
     * được cấu hình riêng thay vì hard-code cột trong performances.
     */
    public function up(): void
    {
        Schema::create('benchmarks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')->constrained()->cascadeOnDelete();

            // Tên hiển thị, ví dụ: "VN-Index", "BTC/USD", "DCDS", "VESAF"
            $table->string('name');

            // Slug dùng làm identifier, ví dụ: "vn_index", "btc", "dcds"
            $table->string('slug');

            // Thứ tự hiển thị trong bảng so sánh
            $table->unsignedSmallInteger('display_order')->default(0);

            $table->timestamps();

            // Mỗi quỹ không được có 2 benchmark cùng slug
            $table->unique(['fund_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benchmarks');
    }
};
