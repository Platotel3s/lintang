<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();

        return view('muspin.periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('muspin.periode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'string',
            'bulanMulai' => 'string',
            'bulanSelesai' => 'string',
        ]);
        Periode::create($request->all());

        return back()->with('success', 'Berhasil menambah periode');
    }

    public function edit(Request $request, $id)
    {
        $pilihPeriode = Periode::findOrFail($id);

        return view('muspin.periode.edit', compact('pilihPeriode'));
    }

    public function update(Request $request, string $id)
    {
        $pilihPeriode = Periode::findOrFail($id);
        $request->validate([
            'nama' => 'nullable',
            'bulanMulai' => 'nullable',
            'bulanSelesai' => 'nullable',
        ]);
        $pilihPeriode->update([
            'nama' => $request->nama,
            'bulanMulai' => $request->bulanMulai,
            'bulanSelesai' => $request->bulanSelesai,
        ]);

        return back()->with('success', 'Berhasil memperbarui periode');
    }

    public function destroy(string $id)
    {
        $pilihPeriode = Periode::findOrFail($id);
        $pilihPeriode->delete();

        return back()->with('success', 'Berhasil Hapus periode');
    }
}
