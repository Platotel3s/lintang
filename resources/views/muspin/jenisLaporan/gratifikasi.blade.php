@extends('layouts.app')
@section('title', 'Daftar Jenis Laporan Gratifikasi')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Upt
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Jenis Laporan
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            File
                        </th>
                    </tr>
                </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($gratifikasi as $itemJenis)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $itemJenis->upt->namaUpt }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $itemJenis->jenisLaporan->jenisLaporan ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('laporan.show', $itemJenis->id) }}" class="text-blue-600 hover:underline">
                                <i class="fas fa-eye"></i> lihat
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
