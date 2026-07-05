<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
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
        $funds = Fund::orderBy('name')->get();

        return view('admin.performances.create', compact('funds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerformanceRequest $request)
    {
        Performance::create($request->validated());

        return redirect()
            ->route('admin.performances.index')
            ->with('success', 'Performance record created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        $funds = Fund::orderBy('name')->get();

        return view('admin.performances.edit', compact('performance', 'funds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerformanceRequest $request, Performance $performance)
    {
        $performance->update($request->validated());

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
}
