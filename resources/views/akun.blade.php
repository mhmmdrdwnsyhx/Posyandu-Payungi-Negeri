<!-- resources/views/akun.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-side-bar></x-side-bar>

        <!-- Content -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-4">Halaman Akun</h1>

            <!-- Menampilkan Data Akun -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Informasi Akun</h2>

                <div class="mb-4">
                    <span class="font-semibold">Nama:</span>
                    <p>{{ auth()->user()->name }}</p>
                </div>

                <div class="mb-4">
                    <span class="font-semibold">Email:</span>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                <div class="mb-4">
                    <span class="font-semibold">Tanggal Bergabung:</span>
                    <p>{{ auth()->user()->created_at->format('d-m-Y') }}</p>
                </div>

                <!-- Form untuk mengganti password (opsional) -->
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Ganti Password</h2>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password
                                Lama</label>
                            <input type="password" id="current_password" name="current_password" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">Password
                                Baru</label>
                            <input type="password" id="new_password" name="new_password" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation"
                                class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Ganti Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
