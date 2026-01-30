@extends('layouts.app')

@section('title', 'Update Password')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-center">Ubah Password</h2>

    @if (session('success'))
    <div class="mb-4 text-green-600 font-medium">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('updatePassword') }}">
        @csrf
        <div class="mb-4">
            <label for="current_password" class="block font-medium text-gray-700">Password Lama</label>
            <input type="password" name="current_password" id="current_password"
                class="w-full border-gray-300 rounded-lg p-2 mt-1 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium text-gray-700">Password Baru</label>
            <input type="password" name="password" id="password"
                class="w-full border-gray-300 rounded-lg p-2 mt-1 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full border-gray-300 rounded-lg p-2 mt-1 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Perbarui Password
            </button>
        </div>
    </form>
</div>
@endsection
