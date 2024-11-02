<!-- resources/views/components/side-bar.blade.php -->
<div x-data="{ open: false }" class="flex">
    <!-- Hamburger Menu -->
    <button @click="open = !open" class="text-white focus:outline-none lg:hidden p-4">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <!-- Sidebar -->
    <div :class="open ? 'block' : 'hidden'"
        class="fixed inset-0 lg:relative lg:w-64 bg-gray-800 text-white p-4 shadow-lg lg:min-h-screen lg:shadow-none lg:block lg:flex lg:flex-col z-40 overflow-y-auto">
        <h1 class="text-2xl font-bold">Menu</h1>
        <ul class="mt-4 flex-grow">
            <li><a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-700">Home</a></li>
            <li><a href="{{ route('data-anak.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data Anak</a></li>
            <li><a href="{{ route('data-ibu-hamil.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data Ibu Hamil</a></li>
            <li><a href="{{ route('data-push.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data PUS</a></li>
            <li><a href="{{ route('data-lansia.index') }}" class="block py-2 px-4 hover:bg-gray-700">Data Lansia</a></li>
        </ul>
        <div class="mt-8">
            <h2 class="text-xl font-bold">Setting</h2>
            <ul class="mt-4">
                <li><a href="{{ route('akun') }}" class="block py-2 px-4 hover:bg-gray-700">Akun</a></li>
                <li>
                    <!-- Logout form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="block py-2 px-4 hover:bg-gray-700">Log-out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
