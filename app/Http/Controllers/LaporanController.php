<?php

namespace App\Http\Controllers;

use App\Models\JenisLaporan;
use App\Models\Laporan;
use App\Models\Periode;
use App\Models\Upt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('upt_id', Auth::id())->latest()->get();
        $periodes = Periode::all();

        return view('upt.laporan.index', compact('laporans', 'periodes'));
    }

    public function create()
    {
        $jenisLaporan = JenisLaporan::all();
        $upt = Auth::user();
        $jenisUpt = Upt::all();
        $periodes = Periode::all();

        return view('upt.laporan.create', compact('jenisLaporan', 'upt', 'jenisUpt', 'periodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_laporan_id' => 'required|exists:jenisLaporans,id',
            'dokumen' => 'required|mimes:pdf|max:5120',
            'periode_id'=>'required|exists:periode_laporan,id',
        ]);
        $path = $request->file('dokumen')->store('dokumen_laporan', 'public');
        Laporan::create([
            'upt_id' => Auth::id(),
            'jenis_laporan_id' => $request->jenis_laporan_id,
            'periode_id'=>$request->periode_id,
            'dokumen' => $path,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim,menunggu verifikasi');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);

        return view('upt.laporan.show', compact('laporan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->status;
        $laporan->save();

        return back()->with('success', 'Status Laporan berhasil diperbarui');
    }

    public function verifikasiIndex()
    {
        $laporans = Laporan::with(['upt', 'jenisLaporan'])->latest()->get();

        return view('muspin.verifikasi.index', compact('laporans'));
    }

    public function verifikasiUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->status;
        $laporan->save();

        return back()->with('success', 'Status Laporan berhasil diperbarui');
    }
}
