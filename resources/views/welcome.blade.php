<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body
    class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-100 via-white to-blue-50 text-gray-800 bg-animated">

    <div class="text-center px-6 animate-fadeUp">
        <h1 class="text-5xl font-extrabold mb-4 text-slate-800">
            Selamat Datang di <span class="text-blue-600">Sistem Laporan UPT</span>
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto mb-10 text-lg leading-relaxed">
            Sistem ini membantu setiap UPT dalam mengirim dan memverifikasi laporan secara cepat, aman, dan efisien.
        </p>

        @guest
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fadeUp" style="animation-delay: 0.3s;">
            <a href="{{ route('loginPage') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Masuk
            </a>
            <a href="{{ route('regisPage') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-user-plus mr-2"></i> Daftar
            </a>
        </div>
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jcikwtux.json" background="transparent"
            speed="2" style="width: 250px; height: 250px; margin: 0 auto;" loop autoplay>
        </lottie-player>

        @endguest

        @auth
        <div class="mt-8 animate-fadeUp" style="animation-delay: 0.3s;">
            @if (Auth::user()->role === 'muspin')
            <a href="{{ route('dashboard.muspin') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-gauge mr-2"></i> Ke Dashboard Muspin
            </a>
            @elseif (Auth::user()->role === 'upt')
            <a href="{{ route('upt.dashboard') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <i class="fa-solid fa-gauge mr-2"></i> Ke Dashboard UPT
            </a>
            @endif
        </div>
        @endauth
    </div>

    <footer class="mt-16 text-sm text-gray-500 animate-fadeUp" style="animation-delay: 0.6s;">
        &copy; {{ date('Y') }} Dinas Komunikasi & Informatika — Semua Hak Dilindungi.
    </footer>

</body>

</html>
