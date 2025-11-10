@extends('layouts.app')

@section('title', 'Verifikasi Laporan UPT')

@section('content')
<div class="p-10 w-full">
    <h1 class="text-2xl font-bold mb-6">Verifikasi Laporan UPT</h1>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left">Jenis Laporan</th>
                <th class="py-3 px-4 text-left">UPT</th>
                <th class="py-3 px-4 text-left">Dokumen</th>
                <th class="py-3 px-4 text-center">Status</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporans as $laporan)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-3 px-4">{{ $laporan->jenisLaporan->jenisLaporan }}</td>
                <td class="py-3 px-4">{{ $laporan->upt->namaUpt }}</td>
                <td class="py-3 px-4">
                    <a href="{{ asset('storage/' . $laporan->dokumen) }}" target="_blank"
                        class="text-blue-600 hover:underline">Lihat PDF</a>
                </td>
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
                    @if ($laporan->status == 'pending')
                    <form action="{{ route('muspin.verifikasi.update', $laporan->id) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="diterima">
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                            Terima
                        </button>
                    </form>

                    <form action="{{ route('muspin.verifikasi.update', $laporan->id) }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Tolak
                        </button>
                    </form>
                    @else
                    <span class="text-gray-500 italic">Sudah diverifikasi</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada laporan masuk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
