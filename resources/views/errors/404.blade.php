<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">

</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 to-blue-100">
        <div class="text-center bg-white/80 backdrop-blur-md p-10 rounded-2xl shadow-lg max-w-md">
            <i class="fa-solid fa-triangle-exclamation text-red-500 text-6xl mb-6"></i>
            <h1 class="text-4xl font-bold text-gray-800 mb-3">404</h1>
            <p class="text-gray-600 mb-6">Halaman yang kamu cari tidak ditemukan atau mungkin sudah dipindahkan.</p>
            @auth
            @if (Auth::user()->role==='muspin')
            <a href="{{ route('dashboard.muspin') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fa-solid fa-house"></i> Kembali ke Dashboard
            </a>
            @elseif(Auth::user()->role==='upt')
            <a href="{{ route('dashboard.upt') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fa-solid fa-house"></i> Kembali ke Dashboard
            </a>
            @endif
            @endauth
        </div>
    </div>
</body>

</html>
