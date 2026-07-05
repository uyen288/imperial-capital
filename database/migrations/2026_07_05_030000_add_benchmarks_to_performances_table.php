<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Adds benchmark columns (VN-Index, DCDS, VESAF) to the performances table.
     * Each performance row (per date) stores both fund data and benchmark data
     * so comparisons can be done in a single query.
     */
    public function up(): void
    {
        Schema::table('performances', function (Blueprint $table) {
            // VN-Index benchmark
            $table->decimal('vn_index_nav', 15, 2)->nullable()->after('ytd');
            $table->decimal('vn_index_one_month', 8, 2)->nullable()->after('vn_index_nav');
            $table->decimal('vn_index_three_month', 8, 2)->nullable()->after('vn_index_one_month');
            $table->decimal('vn_index_one_year', 8, 2)->nullable()->after('vn_index_three_month');
            $table->decimal('vn_index_three_year', 8, 2)->nullable()->after('vn_index_one_year');
            $table->decimal('vn_index_ytd', 8, 2)->nullable()->after('vn_index_three_year');

            // Dragon Capital DCDS benchmark
            $table->decimal('dcds_nav', 15, 2)->nullable()->after('vn_index_ytd');
            $table->decimal('dcds_one_month', 8, 2)->nullable()->after('dcds_nav');
            $table->decimal('dcds_three_month', 8, 2)->nullable()->after('dcds_one_month');
            $table->decimal('dcds_one_year', 8, 2)->nullable()->after('dcds_three_month');
            $table->decimal('dcds_three_year', 8, 2)->nullable()->after('dcds_one_year');
            $table->decimal('dcds_ytd', 8, 2)->nullable()->after('dcds_three_year');

            // VESAF benchmark
            $table->decimal('vesaf_nav', 15, 2)->nullable()->after('dcds_ytd');
            $table->decimal('vesaf_one_month', 8, 2)->nullable()->after('vesaf_nav');
            $table->decimal('vesaf_three_month', 8, 2)->nullable()->after('vesaf_one_month');
            $table->decimal('vesaf_one_year', 8, 2)->nullable()->after('vesaf_three_month');
            $table->decimal('vesaf_three_year', 8, 2)->nullable()->after('vesaf_one_year');
            $table->decimal('vesaf_ytd', 8, 2)->nullable()->after('vesaf_three_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performances', function (Blueprint $table) {
            $table->dropColumn([
                'vn_index_nav', 'vn_index_one_month', 'vn_index_three_month',
                'vn_index_one_year', 'vn_index_three_year', 'vn_index_ytd',

                'dcds_nav', 'dcds_one_month', 'dcds_three_month',
                'dcds_one_year', 'dcds_three_year', 'dcds_ytd',

                'vesaf_nav', 'vesaf_one_month', 'vesaf_three_month',
                'vesaf_one_year', 'vesaf_three_year', 'vesaf_ytd',
            ]);
        });
    }
};
