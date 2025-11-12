<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','App')</title>
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg/250px-Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg.png">

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
