<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statistik
        $data = [
            'totalSppd' => Sppd::count(),
            'approvedSppd' => Sppd::where('status', 'approved')->count(),
            'pendingSppd' => Sppd::where('status', 'pending')->orWhere('status', 'draft')->count(),
            'rejectedSppd' => Sppd::where('status', 'rejected')->count(),
            'recentSppds' => Sppd::with('user')
                ->latest()
                ->take(5)
                ->get()
        ];

        return view('dashboard', $data);
    }
}