<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg/250px-Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg.png">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login UPT</h1>

        <form action="{{route('login')}}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan email UPT">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan password">
                <input type="checkbox" name="showPw" id="showPw">
                <label for="showPw">Show Password</label>
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                Login
            </button>
            <!-- <p class="text-sm text-center text-gray-600 mt-4">
                Belum punya akun?
                <a href="{{ route('regisPage') }}" class="text-blue-600 hover:underline font-medium">Daftar di
                    sini</a>
            </p> -->
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pw = document.getElementById("password");
            const toggle = document.getElementById("showPw");

            toggle.addEventListener("change", () => {
                pw.type = toggle.checked ? "text" : "password";
            });
        });
    </script>
</body>

</html>
