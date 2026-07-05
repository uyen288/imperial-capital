<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Fund;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('fund')->orderBy('fund_id')->orderByDesc('weight')->get();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function show(Fund $fund)
    {
        $holdings = $fund->portfolios()
            ->orderByDesc('weight')
            ->get();

        $sectorData = $holdings
            ->groupBy('sector')
            ->map(fn($items) => [
                'name' => $items->first()->sector,
                'value' => round($items->sum('weight'), 2),
            ])
            ->values();

        $assetData = $holdings
            ->groupBy('asset_type')
            ->map(fn($items) => [
                'name' => $items->first()->asset_type,
                'value' => round($items->sum('weight'), 2),
            ])
            ->values();

        return view('funds.show', compact(
            'fund',
            'holdings',
            'sectorData',
            'assetData'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funds = Fund::orderBy('name')->get();

        return view('admin.portfolios.create', compact('funds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        Portfolio::create($request->validated());

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio holding created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $funds = Fund::orderBy('name')->get();

        return view('admin.portfolios.edit', compact('portfolio', 'funds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update($request->validated());

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio holding updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio holding deleted successfully.');
    }
}
