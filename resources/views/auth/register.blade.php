@extends('layouts.app')

@section('title', 'Tambah Akun UPT')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md mx-auto mt-10">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah UPT</h1>
    @if (session('success'))
    <div class="p-2 text-center bg-green-500 text-black rounded-md shadow-md">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="upt_id" class="block mb-2 text-sm font-medium text-gray-900">Nama UPT</label>
            <select name="upt_id" id="upt_id" required class="bg-gray-50 border border-gray-300 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">-- Pilih UPT --</option>
                @foreach ($upts as $upt)
                <option value="{{ $upt->id }}">{{ $upt->namaUpt }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" name="email" id="email" required class="bg-gray-50 border border-gray-300 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan email">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="password" id="password" required class="bg-gray-50 border border-gray-300 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan password">

            <div class="flex items-center gap-2 mt-2">
                <input type="checkbox" id="showPw" onclick="showPassword()"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                <label for="showPw" class="text-sm text-gray-700">Tampilkan Password</label>
            </div>
        </div>
        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="bg-gray-50 border border-gray-300 text-sm rounded-lg
                       focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Konfirmasi password">

            <div class="flex items-center gap-2 mt-2">
                <input type="checkbox" id="showPwConfirmCheck" onclick="showPwConfirm()"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                <label for="showPwConfirmCheck" class="text-sm text-gray-700">Tampilkan Password</label>
            </div>
        </div>
        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700
                   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                   rounded-lg text-sm px-5 py-2.5 text-center transition">
            Daftar
        </button>
    </form>
</div>

<script src="{{ asset('js/register.js') }}"></script>
@endsection
