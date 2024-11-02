<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Posyandu Payungi Negeri</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    @include('components.side-bar')

    <!-- Main Content -->
    <div class="flex-1 ml-0 p-6 transition-all duration-300">
        @yield('content')
        @if (session('status'))
            <script>
                Swal.fire({
                    title: 'Sukses!',
                    text: '{{ session('status') }}',
                    icon: 'success',
                    confirmButtonColor: '#3085d6'
                });
            </script>
        @endif
    </div>
</body>

</html>
