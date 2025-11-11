<?php

namespace App\Http\Controllers;

use App\Models\JenisLaporan;
use App\Models\Upt;
use Illuminate\Http\Request;

class MuspinController extends Controller
{
    public function dashboard()
    {
        return view('muspin.dashboard');
    }

    public function listUpt(Request $request)
    {
        $upt = Upt::all();
        $query = Upt::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('namaUpt', 'LIKE', "%{$search}%");
        }
        $upts = $query->orderBy('namaUpt')->get();

        return view('muspin.daftarUpt', compact('upts', 'upt'));
    }

    public function tambahUpt()
    {
        return view('muspin.createUpt');
    }

    public function insertUpt(Request $request)
    {
        $request->validate([
            'namaUpt' => 'string',
            'alamat' => 'string',
        ]);
        Upt::create($request->all());

        return redirect()->route('list.upt')->with('success', 'Berhasil tambah data');
    }

    public function editUptPage(string $id)
    {
        $pilihUpt = Upt::findOrFail($id);

        return view('muspin.editUpt', compact('pilihUpt'));
    }

    public function updateUpt(Request $request, string $id)
    {
        $request->validate([
            'namaUpt' => 'string|nullable',
            'alamat' => 'nullable|string',
        ]);
        $pilihUpt = Upt::findOrFail($id);
        $pilihUpt->update($request->all());

        return redirect()->route('list.upt')->with('success', 'Berhasil memperbarui data');
    }

    public function hapusUpt(string $id)
    {
        $pilihUpt = Upt::findOrFail($id);
        $pilihUpt->delete();

        return redirect()->route('list.upt')->with('success', 'Berhasil hapus UPT');
    }

    public function daftarJenisLaporan()
    {
        $jenisLaporan = JenisLaporan::all();

        return view('muspin.jenisLaporan.index', compact('jenisLaporan'));
    }

    public function createJenisLaporan()
    {
        return view('muspin.jenisLaporan.create');
    }

    public function storeJenisLaporan(Request $request)
    {
        $request->validate([
            'jenisLaporan' => 'string|required',
        ]);
        JenisLaporan::create($request->all());

        return redirect()->route('create.jenisLaporan');
    }

    public function editJenisLaporan(string $id)
    {
        $cariJenisLaporan = JenisLaporan::findOrFail($id);

        return view('muspin.jenisLaporan.edit', compact('cariJenisLaporan'));
    }

    public function updateJenisLaporan(string $id, Request $request)
    {
        $request->validate([
            'jenisLaporan' => 'required|string',
        ]);
        $pilihJenisLaporan = JenisLaporan::findOrFail($id);
        $pilihJenisLaporan->update($request->all());

        return redirect()->route('index.jenisLaporan');
    }

    public function hapusJenisLaporan(string $id)
    {
        $pilihJenisLaporan = JenisLaporan::findOrFail($id);
        $pilihJenisLaporan->delete();

        return redirect()->route('index.jenisLaporan');
    }
}
