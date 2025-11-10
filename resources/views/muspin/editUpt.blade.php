@extends('layouts.app')
@section('title', 'Edit UPT')
@section('content')
<div class="flex-1 bg-gray-50 min-h-screen p-10">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fa-solid fa-pen-to-square text-yellow-500 mr-2"></i> Edit UPT
        </h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('update.upt', $pilihUpt->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="namaUpt" class="block text-gray-700 font-medium mb-2">Nama UPT</label>
                <input type="text" id="namaUpt" name="namaUpt" value="{{ old('namaUpt', $pilihUpt->namaUpt) }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 p-2"
                    required>
            </div>

            <div>
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea id="alamat" name="alamat"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 p-2"
                    rows="3">{{ old('alamat', $pilihUpt->alamat) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
