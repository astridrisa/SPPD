<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\User;
use Illuminate\Http\Request;

class SppdController extends Controller
{
    public function index()
    {
        $sppds = Sppd::with('user')->latest()->paginate(10);
        return view('sppd.index', compact('sppds'));
    }

    public function create()
    {
        $users = User::all();
        return view('sppd.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_sppd' => 'required|unique:sppd',
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_berangkat',
            'kendaraan' => 'required',
            'keterangan' => 'nullable',
        ]);

        // Set default status jika tidak ada
        $validated['status'] = $validated['status'] ?? 'draft';

        Sppd::create($validated);

        return redirect()->route('sppd.index')->with('success', 'SPPD berhasil dibuat!');
    }

    public function show(Sppd $sppd)
    {
        return view('sppd.show', compact('sppd'));
    }

    public function edit(Sppd $sppd)
    {
        $users = User::all();
        return view('sppd.edit', compact('sppd', 'users'));
    }

    public function update(Request $request, Sppd $sppd)
    {
        // Validasi dasar
        $rules = [
            'nomor_sppd' => 'required|unique:sppd,nomor_sppd,'.$sppd->id,
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_berangkat',
            'kendaraan' => 'required',
            'keterangan' => 'nullable',
        ];

        // Tambahkan validasi status hanya jika user memiliki permission
        if (auth()->user()->can('approve-sppd')) {
            $rules['status'] = 'required|in:draft,approved,rejected';
        }

        $validated = $request->validate($rules);

        // Jika user tidak memiliki permission approve-sppd, jangan update status
        if (!auth()->user()->can('approve-sppd')) {
            unset($validated['status']);
        }

        try {
            $sppd->update($validated);
            return redirect()->route('sppd.index')->with('success', 'SPPD berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal memperbarui SPPD: ' . $e->getMessage()])->withInput();
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:draft,approved,rejected', // Samakan dengan update method
        ]);

        try {
            $sppd = Sppd::findOrFail($id);
            $sppd->status = $request->status;
            $sppd->save();

            return back()->with('success', 'Status SPPD berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal memperbarui status: ' . $e->getMessage()]);
        }
    }

    public function destroy(Sppd $sppd)
    {
        try {
            $sppd->delete();
            return redirect()->route('sppd.index')->with('success', 'SPPD berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus SPPD: ' . $e->getMessage()]);
        }
    }
}