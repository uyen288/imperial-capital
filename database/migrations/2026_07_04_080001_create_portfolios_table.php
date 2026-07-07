<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fund_id')->constrained()->cascadeOnDelete();

            $table->string('company_name')->nullable();
            $table->string('ticker');
            $table->string('sector')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('asset_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
