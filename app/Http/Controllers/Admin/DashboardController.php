<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Performance;
use App\Models\Portfolio;
use App\Models\Document;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'funds' => Fund::count(),
            'performances' => Performance::count(),
            'portfolios' => Portfolio::count(),
            'documents' => Document::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
