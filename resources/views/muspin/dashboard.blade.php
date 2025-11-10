@extends('layouts.app')

@section('title', 'Dashboard Muspin')

@section('content')
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Halo, {{ Auth::user()->name }}</h1>
        <p class="text-gray-600 mb-6">
            Anda login sebagai <span class="font-semibold text-indigo-600">{{ Auth::user()->role }}</span>.
        </p>

        {{-- Statistik utama --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
                <h2 class="text-sm text-gray-500 uppercase">Total UPT</h2>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Upt::count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
                <h2 class="text-sm text-gray-500 uppercase">Laporan Pending</h2>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Laporan::whereNull('status')->count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
                <h2 class="text-sm text-gray-500 uppercase">Laporan Diterima</h2>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Laporan::where('status', 'diterima')->count()
                    }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-500">
                <h2 class="text-sm text-gray-500 uppercase">Laporan Ditolak</h2>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Laporan::where('status', 'ditolak')->count()
                    }}</p>
            </div>
        </div>

        {{-- Daftar laporan terbaru --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Laporan Terbaru</h2>
            <table class="min-w-full text-left border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4">UPT</th>
                        <th class="py-3 px-4">Jenis Laporan</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach (\App\Models\Laporan::with(['upt','jenisLaporan'])->latest()->take(5)->get() as $laporan)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $laporan->upt->namaUpt ?? '-' }}</td>
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
