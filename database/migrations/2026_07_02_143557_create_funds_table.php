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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('short_name')->nullable(true);
            $table->string('slug')->unique();

            $table->string('fund_objective')->nullable(true);
            $table->string('investment_strategy')->nullable(true);

            $table->date('founded_date');

            $table->string('asset_class');
            $table->string('fund_type');
            $table->string('strategy');
            $table->string('suggestion_investion_time');
            $table->string('subscription_fee');
            $table->string('management_fee');

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
