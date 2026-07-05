<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Fund;
use App\Models\Performance;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        // ─── Fund 1: IC Stock Fund ─────────────────────────
        $stockFund = Fund::create([
            'name' => 'IC Stock Fund',
            'short_name' => 'ICSF',
            'slug' => 'ic-stock-fund',
            'short_description' => 'A concentrated equity fund targeting high-quality Vietnamese listed companies with strong fundamentals and sustainable growth.',
            'description' => 'IC Stock Fund employs a bottom-up fundamental analysis approach to identify undervalued Vietnamese equities with strong competitive moats, excellent management teams, and clear growth trajectories.',
            'strategy' => 'Bottom-up stock selection focusing on quality growth companies with attractive valuations.',
            'objective' => 'To achieve long-term capital appreciation by investing primarily in Vietnamese equities.',
            'nav' => 15234.50,
            'ytd_return' => 12.35,
            'five_year_return' => 68.20,
            'inception_date' => '2020-06-15',
            'fund_objective' => 'Long-term capital appreciation through Vietnamese equities',
            'investment_strategy' => 'Concentrated bottom-up equity selection',
            'founded_date' => '2020-06-15',
            'asset_class' => 'Equity',
            'fund_type' => 'Open-End Fund',
            'suggestion_investion_time' => '3-5 years',
            'subscription_fee' => '1.5%',
            'management_fee' => '1.8% / year',
            'status' => true,
        ]);

        // Performances for Stock Fund
        Performance::insert([
            [
                'fund_id' => $stockFund->id,
                'date' => '2026-06-30',
                'nav' => 15234.50,
                'one_month' => 2.15,
                'three_month' => 5.80,
                'one_year' => 18.40,
                'three_year' => 45.20,
                'ytd' => 12.35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => $stockFund->id,
                'date' => '2026-05-31',
                'nav' => 14912.30,
                'one_month' => 1.80,
                'three_month' => 4.50,
                'one_year' => 16.20,
                'three_year' => 42.80,
                'ytd' => 9.97,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fund_id' => $stockFund->id,
                'date' => '2026-04-30',
                'nav' => 14648.10,
                'one_month' => -0.50,
                'three_month' => 3.20,
                'one_year' => 14.80,
                'three_year' => 40.10,
                'ytd' => 8.02,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Portfolios for Stock Fund
        Portfolio::insert([
            ['fund_id' => $stockFund->id, 'company_name' => 'FPT Corporation', 'ticker' => 'FPT', 'sector' => 'Technology', 'weight' => 15.20, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Vinhomes JSC', 'ticker' => 'VHM', 'sector' => 'Real Estate', 'weight' => 12.50, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Hoa Phat Group', 'ticker' => 'HPG', 'sector' => 'Materials', 'weight' => 10.80, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Military Bank', 'ticker' => 'MBB', 'sector' => 'Financials', 'weight' => 9.50, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Masan Group', 'ticker' => 'MSN', 'sector' => 'Consumer', 'weight' => 8.30, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ─── Fund 2: IC Venture Fund ───────────────────────
        $ventureFund = Fund::create([
            'name' => 'IC Venture Fund',
            'short_name' => 'ICVF',
            'slug' => 'ic-venture-fund',
            'short_description' => 'A private equity fund investing in early-stage Vietnamese startups with high growth potential.',
            'description' => 'IC Venture Fund focuses on Series A and Series B investments in technology-driven Vietnamese startups. We partner with visionary founders building category-defining businesses.',
            'strategy' => 'Early-stage venture capital with active portfolio management.',
            'objective' => 'To generate superior returns through early-stage equity investments in innovative Vietnamese companies.',
            'nav' => 12500.00,
            'ytd_return' => 8.50,
            'inception_date' => '2022-01-10',
            'fund_objective' => 'Superior returns via early-stage equity investments',
            'investment_strategy' => 'Series A/B venture capital',
            'founded_date' => '2022-01-10',
            'asset_class' => 'Private Equity',
            'fund_type' => 'Closed-End Fund',
            'suggestion_investion_time' => '5-7 years',
            'subscription_fee' => '2.0%',
            'management_fee' => '2.0% / year',
            'status' => true,
        ]);

        Performance::insert([
            [
                'fund_id' => $ventureFund->id,
                'date' => '2026-06-30',
                'nav' => 12500.00,
                'one_month' => 1.50,
                'three_month' => 3.20,
                'one_year' => 10.50,
                'three_year' => null,
                'ytd' => 8.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Portfolio::insert([
            ['fund_id' => $ventureFund->id, 'company_name' => 'TechViet JSC', 'ticker' => 'N/A', 'sector' => 'Technology', 'weight' => 20.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $ventureFund->id, 'company_name' => 'GreenFarm VN', 'ticker' => 'N/A', 'sector' => 'Agriculture', 'weight' => 15.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $ventureFund->id, 'company_name' => 'EduNext Corp', 'ticker' => 'N/A', 'sector' => 'Education', 'weight' => 12.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
