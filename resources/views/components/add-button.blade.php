<!-- resources/views/components/add-button.blade.php -->
@props(['route']) <!-- Mendefinisikan $route sebagai properti -->

<a href="{{ $route }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 mb-4">
    {{ $slot ?? 'Tambah Data' }} <!-- Menggunakan slot atau default ke "Tambah Data" -->Tambah Data
</a>
