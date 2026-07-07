<?php

use Illuminate\Database\Migrations\Migration;

/**
 * Migration này đã được thay thế bởi hệ thống benchmark động.
 * Dữ liệu benchmark giờ được lưu trong bảng `benchmarks` và `benchmark_performances`.
 * File giữ nguyên để không làm hỏng lịch sử migration.
 */
return new class extends Migration {
    public function up(): void
    {
        // No-op: Replaced by benchmarks + benchmark_performances tables.
    }

    public function down(): void
    {
        // No-op.
    }
};
