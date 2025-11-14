@extends('layouts.app')

@section('title', 'Buat Laporan')

@section('content')
<div class="p-10 w-full">
    <h1 class="text-2xl font-bold mb-6">Buat Laporan Baru</h1>

    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
            <select name="jenis_laporan_id" required
                class="mt-1 w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Pilih Jenis Laporan --</option>
                @foreach ($jenisLaporan as $item)
                <option value="{{ $item->id }}">{{ $item->jenisLaporan }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Upload Dokumen (PDF)</label>
            <input type="file" name="dokumen" accept="application/pdf" required
                class="mt-1 w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Triwulan</label>
            <select name="periode_id"
                class="mt-1 w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Pilih Triwulan --</option>
                @foreach ($periodes as $periode)
                <option value="{{$periode->id}}">{{$periode->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection
