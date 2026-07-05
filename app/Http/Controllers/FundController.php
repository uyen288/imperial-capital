<?php

namespace App\Http\Controllers;

use App\Models\Fund;

class FundController extends Controller
{
    /**
     * Display a listing of all funds.
     */
    public function index()
    {
        $funds = Fund::where('status', true)->get();

        return view('funds.index', compact('funds'));
    }

    /**
     * Display the specified fund.
     */
    public function show(Fund $fund)
    {
        $fund->load([
            'performances' => function ($query) {
                $query->orderBy('date', 'desc');
            },
            'portfolios' => function ($query) {
                $query->orderBy('weight', 'desc');
            },
            'documents' => function ($query) {
                $query->orderBy('publish_date', 'desc');
            }
        ]);

        // Sector breakdown for donut chart
        $sectorData = $fund->portfolios
            ->groupBy('sector')
            ->map(fn($items) => [
                'name'  => $items->first()->sector ?? 'Khác',
                'value' => round($items->sum('weight'), 2),
            ])
            ->sortByDesc('value')
            ->values();

        // Asset-type breakdown for donut chart
        $assetData = $fund->portfolios
            ->groupBy('asset_type')
            ->map(fn($items) => [
                'name'  => $items->first()->asset_type ?? 'Khác',
                'value' => round($items->sum('weight'), 2),
            ])
            ->sortByDesc('value')
            ->values();

        return view('funds.show', compact('fund', 'sectorData', 'assetData'));
    }
}
