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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();

            $table->date('inception_date')->nullable();

            $table->decimal('nav', 15, 2)->nullable();
            $table->decimal('ytd_return', 8, 2)->nullable();
            $table->decimal('five_year_return', 8, 2)->nullable();

            $table->text('fund_objective')->nullable();
            $table->text('investment_strategy')->nullable();

            $table->string('asset_class')->nullable();
            $table->string('fund_type')->nullable();
            $table->text('strategy')->nullable();
            $table->string('suggested_investment_time')->nullable();
            $table->string('subscription_fee')->nullable();
            $table->string('management_fee')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
