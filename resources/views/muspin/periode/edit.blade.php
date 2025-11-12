@extends('layouts.app')
@section('title', 'Edit Triwulan')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Edit Triwulan</h2>

                @if (session('success'))
                <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('update.periode', $pilihPeriode->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Triwulan</label>
                        <input type="text" id="nama" name="nama" value="{{ $pilihPeriode->nama }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="bulanMulai" class="block text-sm font-medium text-gray-700">Bulan Mulai</label>
                        <input type="date" id="bulanMulai" name="bulanMulai" value="{{ $pilihPeriode->bulanMulai }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="bulanSelesai" class="block text-sm font-medium text-gray-700">Bulan Selesai</label>
                        <input type="date" id="bulanSelesai" name="bulanSelesai"
                            value="{{ $pilihPeriode->bulanSelesai }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
