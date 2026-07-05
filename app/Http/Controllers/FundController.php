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

        return view('funds.show', compact('fund'));
    }
}
