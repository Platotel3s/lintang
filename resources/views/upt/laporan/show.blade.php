@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
<div class="min-h-screen bg-gray-50 py-10 px-6 sm:px-8 lg:px-10">
    <div class="max-w-4xl mx-auto space-y-6">
        {{-- Header --}}
        <div class="flex items-start justify-between bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <div>
                <h1 class="text-xl font-semibold text-gray-800">Detail Laporan</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Jenis: <span class="font-medium">{{ $laporan->jenisLaporan->jenisLaporan }}</span>
                    &nbsp;•&nbsp;
                    Dari UPT: <span class="font-medium">{{ $laporan->nama_upt }}</span>
                </p>
                <p class="text-xs text-gray-500 mt-2">Dikirim: {{ $laporan->created_at->translatedFormat('d F Y, H:i')
                    }}</p>
            </div>

            {{-- Status badge --}}
            <div class="text-right">
                @if ($laporan->status === 'pending')
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 font-medium">Menunggu</span>
                @elseif ($laporan->status === 'diterima')
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 font-medium">Diterima</span>
                @else
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-800 font-medium">Ditolak</span>
                @endif
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-file-pdf text-red-500 text-2xl"></i>
                    <div>
                        <p class="font-medium text-gray-800">{{ $laporan->jenisLaporan->jenisLaporan }} — {{
                            $laporan->nama_upt }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">File: {{ basename($laporan->dokumen) }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ asset('storage/' . $laporan->dokumen) }}" download
                        class="inline-flex items-center px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md text-sm transition">
                        <i class="fa-solid fa-download mr-2"></i> Download
                    </a>
                    @if (Auth::check() && Auth::user()->role === 'muspin')
                    @if ($laporan->status === 'pending')
                    <form action="{{ route('muspin.verifikasi.update', $laporan->id) }}" method="POST"
                        class="inline-flex">
                        @csrf
                        <input type="hidden" name="status" value="diterima">
                        <button type="submit"
                            class="inline-flex items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-md text-sm transition mr-2">
                            <i class="fa-solid fa-check mr-2"></i> Terima
                        </button>
                    </form>

                    <form action="{{ route('muspin.verifikasi.update', $laporan->id) }}" method="POST"
                        class="inline-flex">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit"
                            class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm transition">
                            <i class="fa-solid fa-times mr-2"></i> Tolak
                        </button>
                    </form>
                    @else
                    <span class="text-sm text-gray-500 italic">Sudah diverifikasi</span>
                    @endif
                    @endif
                </div>
            </div>
            <div class="w-full h-[80vh] md:h-[70vh] lg:h-[80vh] bg-gray-100">
                <object data="{{ asset('storage/' . $laporan->dokumen) }}" type="application/pdf" width="100%"
                    height="100%">
                    <div class="p-6 text-center">
                        <p class="text-gray-700 mb-4">Browser Anda tidak mendukung tampilan PDF inline.</p>
                        <a href="{{ asset('storage/' . $laporan->dokumen) }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <i class="fa-solid fa-file-pdf mr-2"></i> Buka / Download PDF
                        </a>
                    </div>
                </object>
            </div>
        </div>
        @if ($laporan->status === 'ditolak' && $laporan->keterangan)
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
            <p class="font-medium">Alasan penolakan:</p>
            <p class="text-sm mt-1">{{ $laporan->keterangan }}</p>
        </div>
        @endif
        <div class="flex justify-end">
            <a href="{{ url()->previous() ?? route('laporan.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
