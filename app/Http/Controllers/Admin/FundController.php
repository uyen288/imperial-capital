<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Models\Fund;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Fund::latest()->get();

        return view('admin.funds.index', compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.funds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFundRequest $request)
    {
        Fund::create($request->validated());

        return redirect()
            ->route('admin.funds.index')
            ->with('success', 'Fund created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fund $fund)
    {
        return view('admin.funds.edit', compact('fund'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFundRequest $request, Fund $fund)
    {
        $fund->update($request->validated());

        return redirect()
            ->route('admin.funds.index')
            ->with('success', 'Fund updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fund $fund)
    {
        $fund->delete();

        return redirect()
            ->route('admin.funds.index')
            ->with('success', 'Fund deleted successfully.');
    }
}
