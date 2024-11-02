<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="bg-gray-100 flex h-screen">
    <div x-data="{ open: false }" class="flex h-screen">
        <!-- Sidebar -->
        <div :class="{ 'block': open, 'hidden': !open }"
            class="w-64 bg-gray-800 text-white fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Menu</h1>
                <ul class="mt-4">
                    <li><a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-700">Home</a></li>
                    <li><a href="{{ route('data-anak.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data Anak</a>
                    </li>
                    <li><a href="{{ route('data-ibu-hamil.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data Ibu
                            Hamil</a></li>
                    <li><a href="{{ route('data-push.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data PUS</a>
                    </li>
                    <li><a href="{{ route('data-lansia.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data
                            Lansia</a></li>
                </ul>
                <div class="mt-8">
                    <h2 class="text-xl font-bold">Setting</h2>
                    <ul class="mt-4">
                        <li><a href="{{ route('akun') }}" class="block py-2 px-4 hover:bg-gray-700">Akun</a></li>
                        <li><a href="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-700">Log-out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            <button @click="open = !open" class="text-gray-500 focus:outline-none lg:hidden">
                <i class="fas fa-bars fa-2x"></i>
            </button>

            @yield('content')
        </div>
    </div>
</body>

</html>
