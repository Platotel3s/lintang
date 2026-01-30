@extends('layouts.app')

@section('title', 'Update Profile')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-center">Ubah Profil</h2>

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

    <form method="POST" action="{{ route('updateProfil') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                class="w-full border-gray-300 rounded-lg p-2 mt-1 focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                class="w-full border-gray-300 rounded-lg p-2 mt-1 focus:ring focus:ring-blue-200">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
