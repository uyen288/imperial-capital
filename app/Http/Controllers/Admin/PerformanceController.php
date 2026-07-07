<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use App\Models\Benchmark;
use App\Models\BenchmarkPerformance;
use App\Models\Fund;
use App\Models\Performance;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performances = Performance::with('fund')->latest('date')->get();

        return view('admin.performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funds = Fund::with('benchmarks')->orderBy('name')->get();

        return view('admin.performances.create', compact('funds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformanceRequest $request)
    {
        $validated = $request->validated();

        // Tách benchmark data ra trước khi tạo Performance
        $benchmarksData = $validated['benchmarks'] ?? [];
        unset($validated['benchmarks']);

        $performance = Performance::create($validated);

        // Lưu dữ liệu benchmark vào bảng riêng
        $this->syncBenchmarkPerformances($performance, $benchmarksData);

        return redirect()
            ->route('admin.performances.index')
            ->with('success', 'Performance record created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        $funds = Fund::with('benchmarks')->orderBy('name')->get();

        // Load benchmark data hiện có của kỳ này (keyed by benchmark_id)
        $existingBenchmarkData = $performance
            ->benchmarkPerformances()
            ->get()
            ->keyBy('benchmark_id');

        return view('admin.performances.edit', compact('performance', 'funds', 'existingBenchmarkData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerformanceRequest $request, Performance $performance)
    {
        $validated = $request->validated();

        $benchmarksData = $validated['benchmarks'] ?? [];
        unset($validated['benchmarks']);

        $performance->update($validated);

        $this->syncBenchmarkPerformances($performance, $benchmarksData);

        return redirect()
            ->route('admin.performances.index')
            ->with('success', 'Performance record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
        $performance->delete();

        return redirect()
            ->route('admin.performances.index')
            ->with('success', 'Performance record deleted successfully.');
    }

    /**
     * Upsert dữ liệu benchmark cho 1 performance record.
     *
     * @param  Performance  $performance
     * @param  array        $benchmarksData   Mảng benchmark từ form: [['benchmark_id'=>1,'nav'=>...], ...]
     */
    private function syncBenchmarkPerformances(Performance $performance, array $benchmarksData): void
    {
        foreach ($benchmarksData as $bData) {
            $benchmarkId = $bData['benchmark_id'] ?? null;
            if (! $benchmarkId) {
                continue;
            }

            BenchmarkPerformance::updateOrCreate(
                [
                    'benchmark_id'  => $benchmarkId,
                    'performance_id' => $performance->id,
                ],
                [
                    'nav'         => $bData['nav'] ?? null,
                    'one_month'   => $bData['one_month'] ?? null,
                    'three_month' => $bData['three_month'] ?? null,
                    'one_year'    => $bData['one_year'] ?? null,
                    'three_year'  => $bData['three_year'] ?? null,
                    'ytd'         => $bData['ytd'] ?? null,
                ]
            );
        }
    }
}

