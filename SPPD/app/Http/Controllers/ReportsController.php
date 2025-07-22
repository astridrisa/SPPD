<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        // Kirim data dummy (opsional)
        $reports = [
            ['judul' => 'Laporan Perjalanan Bandung', 'tanggal' => '2025-07-01'],
            ['judul' => 'Laporan Surabaya', 'tanggal' => '2025-07-05'],
        ];

        return view('reports.index', compact('reports'));
    }
}
