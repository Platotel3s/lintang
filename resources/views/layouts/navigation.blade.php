<nav class="flex flex-col bg-slate-900 text-white w-64 min-h-screen p-6 shadow-lg overflow-y-scroll">
    <div class="mb-6 flex justify-center">
        @auth
        @php
        $role = Auth::user()->role;
        // jumlah laporan pending untuk muspin (jika model Laporan ada)
        $pendingCount = 0;
        if ($role === 'muspin') {
        try {
        $pendingCount = \App\Models\Laporan::where('status', 'pending')->count();
        } catch (\Throwable $e) {
        $pendingCount = 0;
        }
        }
        @endphp

        <a href="{{ $role === 'muspin' ? route('dashboard.muspin') : route('dashboard.upt') }}">
            <img src="{{ Auth::user()->image ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg/250px-Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg.png' }}"
                alt="logo"
                class="h-24 w-24 rounded-full border-4 border-slate-600 hover:scale-105 transition-all duration-300 object-cover">
        </a>
        @else
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') ?? 'https://i.pinimg.com/1200x/8c/6c/db/8c6cdbd18862893b595c2f93f2731efd.jpg' }}"
                alt="logo" class="h-24 w-24 rounded-full border-4 border-slate-600 object-cover">
        </a>
        @endauth
    </div>
    @auth
    <div class="text-center mb-6">
        <p class="font-semibold">{{ Auth::user()->name }}</p>
        <p class="text-xs text-slate-300 capitalize">{{ Auth::user()->role }}</p>
    </div>
    @endauth
    <div class="space-y-2 flex-1">
        @auth
        @if (Auth::user()->role === 'muspin')
        <a href="{{ route('dashboard.muspin') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition flex items-center justify-between {{ request()->routeIs('dashboard.muspin') ? 'bg-slate-800' : '' }}">
            <span><i class="fa-solid fa-gauge-high mr-2"></i> Dashboard</span>
        </a>

        <a href="{{ route('tambah.upt') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('tambah.upt') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-plus mr-2"></i> Tambah UPT
        </a>

        <a href="{{ route('list.upt') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('list.upt') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-list mr-2"></i> Daftar UPT
        </a>

        <a href="{{ route('index.jenisLaporan') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('index.jenisLaporan') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-file-alt mr-2"></i> Jenis Laporan
        </a>

        <a href="{{ route('create.jenisLaporan') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('create.jenisLaporan') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-file-circle-plus mr-2"></i> Tambah Jenis Laporan
        </a>
        <a href="{{ route('muspin.verifikasi.index') ?? route('index.jenisLaporan') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition flex items-center justify-between {{ request()->routeIs('muspin.verifikasi.*') ? 'bg-slate-800' : '' }}">
            <span><i class="fa-solid fa-file-signature mr-2"></i> Verifikasi Laporan</span>
            @if($pendingCount > 0)
            <span class="text-xs bg-red-600 text-white px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
            @endif
        </a>
        <a href="{{ route('index.periode')}}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition flex items-center justify-between">
            <span><i class="fa-solid fa-calendar mr-2"></i>Daftar Triwulan</span>
        </a>

        @elseif (Auth::user()->role === 'upt')
        <a href="{{ route('dashboard.upt') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('dashboard.upt') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-gauge mr-2"></i> Dashboard
        </a>

        <a href="{{ route('laporan.create') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('laporan.create') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-pen-to-square mr-2"></i> Buat Laporan
        </a>

        <a href="{{ route('laporan.index') }}"
            class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition {{ request()->routeIs('laporan.*') ? 'bg-slate-800' : '' }}">
            <i class="fa-solid fa-list mr-2"></i> Daftar Laporan
        </a>
        @endif
        @else
        <a href="{{ route('loginPage') }}" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition">
            <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
        </a>
        @if (Route::has('registerPage'))
        <a href="{{ route('registerPage') }}" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition">
            <i class="fa-solid fa-user-plus mr-2"></i> Register
        </a>
        @endif
        @endauth
    </div>
    <div class="border-t border-slate-700 pt-4 mt-6 space-y-2">
        <a href="{{ route('updateProfilePage') }}" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition">
            <i class="fa-solid fa-user mr-2"></i> Update Profile
        </a>
        <a href="{{ route('updatePasswordPage') }}" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition">
            <i class="fa-solid fa-key mr-2"></i> Update Password
        </a>

        @auth
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit"
                class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg flex items-center justify-center transition shadow-md">
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Keluar
            </button>
        </form>
        @endauth
    </div>
</nav>
