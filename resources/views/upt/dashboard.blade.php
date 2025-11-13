@extends('layouts.app')

@section('title', 'Dashboard UPT')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Halo, {{ Auth::user()->name }}</h1>
        <p class="text-gray-600 mb-6">
            Anda login sebagai <span class="font-semibold text-indigo-600">{{ Auth::user()->role }}</span>.
        </p>

        {{-- Statistik pribadi --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
                <h2 class="text-sm text-gray-500 uppercase">Total Laporan</h2>
                <p class="text-2xl font-bold text-gray-900">
                    {{ \App\Models\Laporan::where('upt_id', Auth::id())->count() }}
                </p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
                <h2 class="text-sm text-gray-500 uppercase">Menunggu Verifikasi</h2>
                <p class="text-2xl font-bold text-gray-900">
                    {{ \App\Models\Laporan::where('upt_id',
                    Auth::id())->whereNull('status')->orWhere('status','pending')->count() }}
                </p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
                <h2 class="text-sm text-gray-500 uppercase">Diterima</h2>
                <p class="text-2xl font-bold text-gray-900">
                    {{ \App\Models\Laporan::where('upt_id', Auth::id())->where('status','diterima')->count() }}
                </p>
            </div>
        </div>

        {{-- Tombol Buat Laporan --}}
        <div class="mb-8">
            <a href="{{ route('laporan.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
                + Buat Laporan Baru
            </a>
        </div>

        {{-- Daftar laporan milik UPT --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Laporan Saya</h2>
            <table class="min-w-full text-left border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4">Jenis Laporan</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach (\App\Models\Laporan::with('jenisLaporan')->where('upt_id',
                    Auth::id())->latest()->take(5)->get() as $laporan)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $laporan->jenisLaporan->jenisLaporan ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $laporan->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4">
                            @if ($laporan->status === 'diterima')
                            <span class="text-green-600 font-semibold">Diterima</span>
                            @elseif ($laporan->status === 'ditolak')
                            <span class="text-red-600 font-semibold">Ditolak</span>
                            @else
                            <span class="text-yellow-600 font-semibold">Menunggu</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('laporan.show', $laporan->id) }}"
                                class="text-blue-600 hover:underline">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
