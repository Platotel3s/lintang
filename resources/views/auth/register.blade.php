<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg/250px-Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg.png">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Registrasi UPT</h1>

        <form action="{{route('register')}}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama UPT</label>
                <input type="text" name="name" id="name" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan nama UPT">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan email">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan password">
                <input type="checkbox" name="showPw" id="showPw" onclick="showPassword()">
                <label for="showPw">Show Password</label>
            </div>
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Konfirmasi password">
                <input type="checkbox" name="showPwConfirmCheck" id="showPwConfirmCheck" onclick="showPwConfirm()">
                <label for="showPwConfirmCheck">Show Password</label>
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                Daftar
            </button>
            <p class="text-sm text-center text-gray-600 mt-4">
                Sudah punya akun?
                <a href="{{route('loginPage')}}" class="text-blue-600 hover:underline font-medium">Masuk di sini</a>
            </p>
        </form>
    </div>
    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>
