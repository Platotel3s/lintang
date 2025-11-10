<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','App')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
</head>

<body class="bg-white">
    <div class="flex flex-col">
        <div class="flex flex-1">
            <div class="flex flex-1 bg-slate-800">
                @include('layouts.navigation')
            </div>
            <div class="flex-5">
                @yield('content')
            </div>
        </div>
        <footer class="bg-black p-1 text-center">
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
