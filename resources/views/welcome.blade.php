<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="min-h-screen flex flex-col justify-center items-center text-gray-800 relative">
    <div class="background-carousel">
        <img src="{{ asset('images/c1.jpeg') }}" class="active" alt="bg1">
        <img src="{{ asset('images/c2.jpeg') }}" alt="bg2">
        <img src="{{ asset('images/c3.jpeg') }}" alt="bg3">
        <img src="{{ asset('images/c4.jpeg') }}" alt="bg4">
        <img src="{{ asset('images/c5.jpeg') }}" alt="bg5">
        <img src="{{ asset('images/c6.jpeg') }}" alt="bg6">
    </div>
    <div class="overlay"></div>
    <div class="text-center px-6 z-10">
        <h1 class="text-5xl font-extrabold mb-4 text-slate-800">
            Selamat Datang di <span class="text-blue-600">Sistem Laporan UPT</span>
        </h1>
        <p class="text-gray-700 max-w-2xl mx-auto mb-10 text-lg leading-relaxed">
            Sistem ini membantu setiap UPT dalam mengirim dan memverifikasi laporan secara cepat, aman, dan efisien.
        </p>

        @guest
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('loginPage') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Masuk
            </a>
            <!-- <a href="{{ route('regisPage') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-user-plus mr-2"></i> Daftar
            </a> -->
        </div>
        @endguest

        @auth
        <div class="mt-8">
            @if (Auth::user()->role === 'muspin')
            <a href="{{ route('dashboard.muspin') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-gauge mr-2"></i> Ke Dashboard Muspin
            </a>
            @elseif (Auth::user()->role === 'upt')
            <a href="{{ route('dashboard.upt') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-gauge mr-2"></i> Ke Dashboard UPT
            </a>
            @endif
        </div>
        @endauth
    </div>

    <footer class="mt-16 text-sm text-gray-500 z-10">
        &copy; {{ date('Y') }} Dinas Komunikasi & Informatika — Semua Hak Dilindungi.
    </footer>

    <script src="{{ asset('js/welcome.js') }}"></script>
</body>

</html>
