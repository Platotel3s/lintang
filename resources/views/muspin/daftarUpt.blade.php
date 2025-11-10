@extends('layouts.app')

@section('title', 'Daftar UPT')

@section('content')
<div class="flex-1 bg-gray-100 min-h-screen p-10">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                <i class="fa-solid fa-list text-blue-600 mr-2"></i> Daftar UPT
            </h2>
            <a href="{{ route('tambah.upt') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fa-solid fa-plus mr-2"></i>Tambah UPT
            </a>
        </div>

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto h-dvh overflow-y-scroll">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">#</th>
                        <th class="py-3 px-4 border-b">Nama UPT</th>
                        <th class="py-3 px-4 border-b">Alamat</th>
                        <th class="py-3 px-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($upt as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 border-b">{{ $item->namaUpt }}</td>
                        <td class="py-3 px-4 border-b">{{ $item->alamat }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            <a href="{{ route('edit.upt', $item->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium mr-3">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('hapus.upt', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                    onclick="return confirm('Yakin ingin menghapus UPT ini?')">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-gray-500">Belum ada data UPT.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
