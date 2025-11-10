@extends('layouts.app')

@section('title', 'Daftar Laporan Saya')

@section('content')
<div class="p-10 w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Laporan Saya</h1>
        <a href="{{ route('laporan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Buat Laporan
        </a>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left">Jenis Laporan</th>
                <th class="py-3 px-4 text-left">Nama UPT</th>
                <th class="py-3 px-4 text-center">Status</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporans as $laporan)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4">{{ $laporan->jenisLaporan->jenisLaporan }}</td>
                <td class="py-3 px-4">{{ $laporan->upt->namaUpt }}</td>
                <td class="py-3 px-4 text-center">
                    @if ($laporan->status == 'pending')
                    <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full">Menunggu</span>
                    @elseif ($laporan->status == 'diterima')
                    <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full">Diterima</span>
                    @else
                    <span class="bg-red-200 text-red-800 px-3 py-1 rounded-full">Ditolak</span>
                    @endif
                </td>
                <td class="py-3 px-4 text-center">
                    <a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4 text-gray-500">Belum ada laporan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
