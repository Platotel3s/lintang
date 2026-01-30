@extends('layouts.app')
@section('title', 'Edit Jenis Laporan')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Edit Jenis Laporan</h2>
                <form action="{{ route('update.jenisLaporan', $cariJenisLaporan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="jenisLaporan" class="block text-sm font-medium text-gray-700">Nama Jenis
                            Laporan</label>
                        <input type="text" id="jenisLaporan" name="jenisLaporan"
                            value="{{ $cariJenisLaporan->jenisLaporan }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
