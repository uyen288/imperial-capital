<?php

namespace Database\Seeders;

use App\Models\Benchmark;
use App\Models\BenchmarkPerformance;
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
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        // ─── Fund 1: IC Stock Fund ─────────────────────────
        $stockFund = Fund::create([
            'name'       => 'Imperial Capital',
            'short_name' => 'IMC',
            'slug'       => 'imperial-capital',

            'inception_date' => '2026-01-01',

            'nav'              => 15234.50,
            'ytd_return'       => 12.35,
            'five_year_return' => 68.20,

            'fund_objective'      => 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.',
            'investment_strategy' => 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.',

            'asset_class'               => 'Cổ phiếu',
            'fund_type'                 => 'Quỹ cổ phiếu',
            'strategy'                  => 'Đầu tư giá trị',
            'suggested_investment_time' => '3-5 năm',
            'subscription_fee'          => 'Miễn phí',
            'management_fee'            => '1%/NAV/năm & 25% của hurdle rate 6%',

            'status' => true,
        ]);

        // Benchmarks cho Stock Fund (cổ phiếu → VN-Index, DCDS, VESAF)
        $vnIndex = Benchmark::create(['fund_id' => $stockFund->id, 'name' => 'VN-Index', 'slug' => 'vn_index', 'display_order' => 1]);
        $dcds    = Benchmark::create(['fund_id' => $stockFund->id, 'name' => 'DCDS',     'slug' => 'dcds',     'display_order' => 2]);
        $vesaf   = Benchmark::create(['fund_id' => $stockFund->id, 'name' => 'VESAF',    'slug' => 'vesaf',    'display_order' => 3]);

        // Performances cho Stock Fund (chỉ fund data, benchmark ở bảng riêng)
        $stockPerfs = [
            [
                'date'        => '2026-06-30',
                'nav'         => 15234.50,
                'one_month'   => -5.99,
                'three_month' => -16.50,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => -0.70,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1844.54,   'one_month' => -0.50, 'three_month' =>  -1.90, 'one_year' => 38.40, 'three_year' => 71.60, 'ytd' =>  3.40],
                    $dcds->id    => ['nav' => 104707.02, 'one_month' => -2.50, 'three_month' =>  -9.96, 'one_year' => 18.50, 'three_year' => 80.60, 'ytd' => -6.50],
                    $vesaf->id   => ['nav' => 34456.26,  'one_month' => -1.60, 'three_month' => -10.50, 'one_year' => 14.90, 'three_year' => 50.10, 'ytd' =>  1.13],
                ],
            ],
            [
                'date'        => '2026-05-31',
                'nav'         => 16200.00,
                'one_month'   => 2.10,
                'three_month' => -8.50,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => 5.90,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1853.80,   'one_month' => 1.20, 'three_month' => -0.80, 'one_year' => 40.10, 'three_year' => 74.20, 'ytd' =>  3.90],
                    $dcds->id    => ['nav' => 107380.50, 'one_month' => 0.80, 'three_month' => -7.20, 'one_year' => 20.10, 'three_year' => 83.50, 'ytd' => -4.00],
                    $vesaf->id   => ['nav' => 35010.80,  'one_month' => 0.50, 'three_month' => -8.00, 'one_year' => 16.20, 'three_year' => 52.30, 'ytd' =>  2.73],
                ],
            ],
            [
                'date'        => '2026-04-30',
                'nav'         => 15860.00,
                'one_month'   => -5.20,
                'three_month' => -12.30,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => 3.60,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1831.50,   'one_month' => -0.30, 'three_month' =>  1.50, 'one_year' => 35.20, 'three_year' => 68.90, 'ytd' =>  2.60],
                    $dcds->id    => ['nav' => 106520.00, 'one_month' => -1.80, 'three_month' => -5.30, 'one_year' => 17.60, 'three_year' => 78.10, 'ytd' => -4.80],
                    $vesaf->id   => ['nav' => 34840.00,  'one_month' => -1.10, 'three_month' => -6.80, 'one_year' => 13.80, 'three_year' => 48.50, 'ytd' =>  2.17],
                ],
            ],
            [
                'date'        => '2026-03-31',
                'nav'         => 16730.00,
                'one_month'   => 3.50,
                'three_month' => -6.20,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => 9.40,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1837.00,   'one_month' => 2.10, 'three_month' =>  3.80, 'one_year' => 36.50, 'three_year' => 70.30, 'ytd' =>  2.80],
                    $dcds->id    => ['nav' => 108450.00, 'one_month' => 1.20, 'three_month' => -3.10, 'one_year' => 19.30, 'three_year' => 82.00, 'ytd' => -3.00],
                    $vesaf->id   => ['nav' => 35220.00,  'one_month' => 0.80, 'three_month' => -4.50, 'one_year' => 15.10, 'three_year' => 50.80, 'ytd' =>  3.30],
                ],
            ],
            [
                'date'        => '2026-02-28',
                'nav'         => 16160.00,
                'one_month'   => 5.80,
                'three_month' => 8.90,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => 5.70,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1799.80,   'one_month' => 1.80, 'three_month' => 4.20, 'one_year' => 34.10, 'three_year' => 67.50, 'ytd' =>  0.70],
                    $dcds->id    => ['nav' => 107150.00, 'one_month' => 0.60, 'three_month' => 2.10, 'one_year' => 18.00, 'three_year' => 79.20, 'ytd' => -4.20],
                    $vesaf->id   => ['nav' => 34940.00,  'one_month' => 1.10, 'three_month' => 3.60, 'one_year' => 14.20, 'three_year' => 49.60, 'ytd' =>  2.48],
                ],
            ],
            [
                'date'        => '2026-01-31',
                'nav'         => 15274.00,
                'one_month'   => 9.80,
                'three_month' => 12.50,
                'one_year'    => null,
                'three_year'  => null,
                'ytd'         => 0.00,
                'benchmarks'  => [
                    $vnIndex->id => ['nav' => 1768.30,   'one_month' => -1.10, 'three_month' => 2.10, 'one_year' => 31.80, 'three_year' => 64.20, 'ytd' => -1.10],
                    $dcds->id    => ['nav' => 106510.00, 'one_month' => -0.40, 'three_month' => 1.50, 'one_year' => 17.10, 'three_year' => 77.80, 'ytd' => -4.80],
                    $vesaf->id   => ['nav' => 34560.00,  'one_month' =>  0.30, 'three_month' => 2.80, 'one_year' => 13.40, 'three_year' => 48.10, 'ytd' =>  1.35],
                ],
            ],
        ];

        $this->insertPerformancesWithBenchmarks($stockFund->id, $stockPerfs);

        // Portfolios for Stock Fund
        Portfolio::insert([
            ['fund_id' => $stockFund->id, 'company_name' => 'FPT Corporation', 'ticker' => 'FPT', 'sector' => 'Technology',  'weight' => 15.20, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Vinhomes JSC',    'ticker' => 'VHM', 'sector' => 'Real Estate', 'weight' => 12.50, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Hoa Phat Group',  'ticker' => 'HPG', 'sector' => 'Materials',   'weight' => 10.80, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Military Bank',   'ticker' => 'MBB', 'sector' => 'Financials',  'weight' =>  9.50, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $stockFund->id, 'company_name' => 'Masan Group',     'ticker' => 'MSN', 'sector' => 'Consumer',    'weight' =>  8.30, 'asset_type' => 'Equity', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ─── Fund 2: IC Venture Fund (Crypto) ─────────────
        $ventureFund = Fund::create([
            'name'       => 'Venture Imperial Capital',
            'short_name' => 'VIMC',
            'slug'       => 'venture-imperial-capital',

            'inception_date' => '2026-01-01',

            'nav'              => 15234.50,
            'ytd_return'       => 12.35,
            'five_year_return' => 68.20,

            'fund_objective'      => 'Imperial Capital hướng đến việc tạo ra lợi nhuận vượt trội bằng cách tập trung vào các doanh nghiệp vốn hóa nhỏ bị thị trường định giá sai. Quỹ ưu tiên những cơ hội có biên an toàn lớn, xuất phát từ sự thiếu thanh khoản hoặc bị bỏ quên, qua đó giảm thiểu rủi ro và tối ưu hóa hiệu quả đầu tư.',
            'investment_strategy' => 'Chiến lược của Imperial Capital là lựa chọn các doanh nghiệp có khả năng tái cấu trúc hoặc cải thiện hoạt động, đồng thời sở hữu catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại. Thời gian hiện thực hóa giá trị được kỳ vọng trong khoảng 6-18 tháng.',

            'asset_class'               => 'Crypto',
            'fund_type'                 => 'Quỹ Crypto',
            'strategy'                  => 'Đầu tư giá trị',
            'suggested_investment_time' => '3-5 năm',
            'subscription_fee'          => 'Miễn phí',
            'management_fee'            => '1%/NAV/năm & 25% của hurdle rate 6%',

            'status' => true,
        ]);

        // Benchmarks cho Crypto Fund (crypto → BTC, ETH)
        $btc = Benchmark::create(['fund_id' => $ventureFund->id, 'name' => 'BTC/USD', 'slug' => 'btc', 'display_order' => 1]);
        $eth = Benchmark::create(['fund_id' => $ventureFund->id, 'name' => 'ETH/USD', 'slug' => 'eth', 'display_order' => 2]);

        $cryptoPerfs = [
            [
                'date'        => '2026-06-30',
                'nav'         => 12500.00,
                'one_month'   => 1.50,
                'three_month' => 3.20,
                'one_year'    => 10.50,
                'three_year'  => null,
                'ytd'         => 8.50,
                'benchmarks'  => [
                    $btc->id => ['nav' => 97500.00, 'one_month' => 5.20, 'three_month' => 12.80, 'one_year' => 45.60, 'three_year' => null, 'ytd' => 18.30],
                    $eth->id => ['nav' =>  3850.00, 'one_month' => 3.10, 'three_month' =>  8.40, 'one_year' => 28.70, 'three_year' => null, 'ytd' => 10.20],
                ],
            ],
        ];

        $this->insertPerformancesWithBenchmarks($ventureFund->id, $cryptoPerfs);

        Portfolio::insert([
            ['fund_id' => $ventureFund->id, 'company_name' => 'TechViet JSC', 'ticker' => 'N/A', 'sector' => 'Technology', 'weight' => 20.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $ventureFund->id, 'company_name' => 'GreenFarm VN', 'ticker' => 'N/A', 'sector' => 'Agriculture', 'weight' => 15.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
            ['fund_id' => $ventureFund->id, 'company_name' => 'EduNext Corp',  'ticker' => 'N/A', 'sector' => 'Education',   'weight' => 12.00, 'asset_type' => 'Private Equity', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Helper: Insert performances + benchmark_performances cho 1 quỹ.
     *
     * @param  int    $fundId
     * @param  array  $perfs   Mỗi phần tử gồm fund data + 'benchmarks' keyed by benchmark_id
     */
    private function insertPerformancesWithBenchmarks(int $fundId, array $perfs): void
    {
        foreach ($perfs as $perfData) {
            $benchmarksData = $perfData['benchmarks'] ?? [];
            unset($perfData['benchmarks']);

            $performance = Performance::create(array_merge(
                $perfData,
                ['fund_id' => $fundId]
            ));

            foreach ($benchmarksData as $benchmarkId => $bData) {
                BenchmarkPerformance::create(array_merge(
                    $bData,
                    [
                        'benchmark_id'   => $benchmarkId,
                        'performance_id' => $performance->id,
                    ]
                ));
            }
        }
    }
}
