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
            'name' => 'Imperial Capital',
            'short_name' => 'IMC',
            'slug' => 'imperial-capital',

            'inception_date' => '2026-01-01',

            'nav' => 15234.50,
            'ytd_return' => 12.35,
            'five_year_return' => 68.20,

            'fund_objective' => 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.',
            'investment_strategy' => 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.',

            'asset_class' => 'Cổ phiếu',
            'fund_type' => 'Quỹ cổ phiếu',
            'strategy' => 'Đầu tư giá trị',
            'suggested_investment_time' => '3-5 năm',
            'subscription_fee' => 'Miễn phí',
            'management_fee' => '1%/NAV/năm & 25% của hurdle rate 6%',

            'status' => true,
        ]);

        // Performances for Stock Fund (with benchmarks)
        Performance::insert([
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-06-30',
                // Fund
                'nav'                  => 15234.50,
                'one_month'            => -5.99,
                'three_month'          => -16.50,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => -0.70,
                // VN-Index
                'vn_index_nav'         => 1844.54,
                'vn_index_one_month'   => -0.50,
                'vn_index_three_month' => -1.90,
                'vn_index_one_year'    => 38.40,
                'vn_index_three_year'  => 71.60,
                'vn_index_ytd'         => 3.40,
                // DCDS
                'dcds_nav'             => 104707.02,
                'dcds_one_month'       => -2.50,
                'dcds_three_month'     => -9.96,
                'dcds_one_year'        => 18.50,
                'dcds_three_year'      => 80.60,
                'dcds_ytd'             => -6.50,
                // VESAF
                'vesaf_nav'            => 34456.26,
                'vesaf_one_month'      => -1.60,
                'vesaf_three_month'    => -10.50,
                'vesaf_one_year'       => 14.90,
                'vesaf_three_year'     => 50.10,
                'vesaf_ytd'            => 1.13,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-05-31',
                // Fund
                'nav'                  => 16200.00,
                'one_month'            => 2.10,
                'three_month'          => -8.50,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => 5.90,
                // VN-Index
                'vn_index_nav'         => 1853.80,
                'vn_index_one_month'   => 1.20,
                'vn_index_three_month' => -0.80,
                'vn_index_one_year'    => 40.10,
                'vn_index_three_year'  => 74.20,
                'vn_index_ytd'         => 3.90,
                // DCDS
                'dcds_nav'             => 107380.50,
                'dcds_one_month'       => 0.80,
                'dcds_three_month'     => -7.20,
                'dcds_one_year'        => 20.10,
                'dcds_three_year'      => 83.50,
                'dcds_ytd'             => -4.00,
                // VESAF
                'vesaf_nav'            => 35010.80,
                'vesaf_one_month'      => 0.50,
                'vesaf_three_month'    => -8.00,
                'vesaf_one_year'       => 16.20,
                'vesaf_three_year'     => 52.30,
                'vesaf_ytd'            => 2.73,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-04-30',
                // Fund
                'nav'                  => 15860.00,
                'one_month'            => -5.20,
                'three_month'          => -12.30,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => 3.60,
                // VN-Index
                'vn_index_nav'         => 1831.50,
                'vn_index_one_month'   => -0.30,
                'vn_index_three_month' => 1.50,
                'vn_index_one_year'    => 35.20,
                'vn_index_three_year'  => 68.90,
                'vn_index_ytd'         => 2.60,
                // DCDS
                'dcds_nav'             => 106520.00,
                'dcds_one_month'       => -1.80,
                'dcds_three_month'     => -5.30,
                'dcds_one_year'        => 17.60,
                'dcds_three_year'      => 78.10,
                'dcds_ytd'             => -4.80,
                // VESAF
                'vesaf_nav'            => 34840.00,
                'vesaf_one_month'      => -1.10,
                'vesaf_three_month'    => -6.80,
                'vesaf_one_year'       => 13.80,
                'vesaf_three_year'     => 48.50,
                'vesaf_ytd'            => 2.17,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-03-31',
                // Fund
                'nav'                  => 16730.00,
                'one_month'            => 3.50,
                'three_month'          => -6.20,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => 9.40,
                // VN-Index
                'vn_index_nav'         => 1837.00,
                'vn_index_one_month'   => 2.10,
                'vn_index_three_month' => 3.80,
                'vn_index_one_year'    => 36.50,
                'vn_index_three_year'  => 70.30,
                'vn_index_ytd'         => 2.80,
                // DCDS
                'dcds_nav'             => 108450.00,
                'dcds_one_month'       => 1.20,
                'dcds_three_month'     => -3.10,
                'dcds_one_year'        => 19.30,
                'dcds_three_year'      => 82.00,
                'dcds_ytd'             => -3.00,
                // VESAF
                'vesaf_nav'            => 35220.00,
                'vesaf_one_month'      => 0.80,
                'vesaf_three_month'    => -4.50,
                'vesaf_one_year'       => 15.10,
                'vesaf_three_year'     => 50.80,
                'vesaf_ytd'            => 3.30,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-02-28',
                // Fund
                'nav'                  => 16160.00,
                'one_month'            => 5.80,
                'three_month'          => 8.90,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => 5.70,
                // VN-Index
                'vn_index_nav'         => 1799.80,
                'vn_index_one_month'   => 1.80,
                'vn_index_three_month' => 4.20,
                'vn_index_one_year'    => 34.10,
                'vn_index_three_year'  => 67.50,
                'vn_index_ytd'         => 0.70,
                // DCDS
                'dcds_nav'             => 107150.00,
                'dcds_one_month'       => 0.60,
                'dcds_three_month'     => 2.10,
                'dcds_one_year'        => 18.00,
                'dcds_three_year'      => 79.20,
                'dcds_ytd'             => -4.20,
                // VESAF
                'vesaf_nav'            => 34940.00,
                'vesaf_one_month'      => 1.10,
                'vesaf_three_month'    => 3.60,
                'vesaf_one_year'       => 14.20,
                'vesaf_three_year'     => 49.60,
                'vesaf_ytd'            => 2.48,
                'created_at'           => now(),
                'updated_at'           => now(),
            ],
            [
                'fund_id'              => $stockFund->id,
                'date'                 => '2026-01-31',
                // Fund
                'nav'                  => 15274.00,
                'one_month'            => 9.80,
                'three_month'          => 12.50,
                'one_year'             => null,
                'three_year'           => null,
                'ytd'                  => 0.00,
                // VN-Index
                'vn_index_nav'         => 1768.30,
                'vn_index_one_month'   => -1.10,
                'vn_index_three_month' => 2.10,
                'vn_index_one_year'    => 31.80,
                'vn_index_three_year'  => 64.20,
                'vn_index_ytd'         => -1.10,
                // DCDS
                'dcds_nav'             => 106510.00,
                'dcds_one_month'       => -0.40,
                'dcds_three_month'     => 1.50,
                'dcds_one_year'        => 17.10,
                'dcds_three_year'      => 77.80,
                'dcds_ytd'             => -4.80,
                // VESAF
                'vesaf_nav'            => 34560.00,
                'vesaf_one_month'      => 0.30,
                'vesaf_three_month'    => 2.80,
                'vesaf_one_year'       => 13.40,
                'vesaf_three_year'     => 48.10,
                'vesaf_ytd'            => 1.35,
                'created_at'           => now(),
                'updated_at'           => now(),
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
            'name' => 'Venture Imperial Capital',
            'short_name' => 'VIMC',
            'slug' => 'venture-imperial-capital',

            'inception_date' => '2026-01-01',

            'nav' => 15234.50,
            'ytd_return' => 12.35,
            'five_year_return' => 68.20,

            'fund_objective' => 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.',
            'investment_strategy' => 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.',

            'asset_class' => 'Crypto',
            'fund_type' => 'Quỹ Crypto',
            'strategy' => 'Đầu tư giá trị',
            'suggested_investment_time' => '3-5 năm',
            'subscription_fee' => 'Miễn phí',
            'management_fee' => '1%/NAV/năm & 25% của hurdle rate 6%',

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
