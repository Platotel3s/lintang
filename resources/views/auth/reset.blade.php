<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/png"
          href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg/250px-Logo_of_the_Ministry_of_Transportation_of_the_Republic_of_Indonesia.svg.png">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Reset Password</h2>

        <form action="{{ route('reset', $nip) }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Password Baru</label>
                <input type="password" name="password"
                       class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Reset Password
            </button>
        </form>
    </div>

</body>
</html>
