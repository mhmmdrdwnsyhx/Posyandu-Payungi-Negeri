@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Tambah Data PUS</h1>

    <form action="{{ route('data-push.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nik_suami" class="block text-sm font-medium text-gray-700">NIK Suami</label>
            <input type="text" id="nik_suami" name="nik_suami" value="{{ old('nik_suami') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nik_suami')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_suami" class="block text-sm font-medium text-gray-700">Nama Suami</label>
            <input type="text" id="nama_suami" name="nama_suami" value="{{ old('nama_suami') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nama_suami')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tempat_lahir_suami" class="block text-sm font-medium text-gray-700">Tempat Lahir Suami</label>
            <input type="text" id="tempat_lahir_suami" name="tempat_lahir_suami" value="{{ old('tempat_lahir_suami') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('tempat_lahir_suami')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir_suami" class="block text-sm font-medium text-gray-700">Tanggal Lahir Suami</label>
            <input type="date" id="tanggal_lahir_suami" name="tanggal_lahir_suami"
                value="{{ old('tanggal_lahir_suami') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required oninput="hitungUmur('tanggal_lahir_suami', 'umur_suami')">
            @error('tanggal_lahir_suami')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="umur_suami" class="block text-sm font-medium text-gray-700">Umur Suami</label>
            <input type="number" id="umur_suami" name="umur_suami" value="{{ old('umur_suami') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                readonly>
            @error('umur_suami')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nik_istri" class="block text-sm font-medium text-gray-700">NIK Istri</label>
            <input type="text" id="nik_istri" name="nik_istri" value="{{ old('nik_istri') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nik_istri')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_istri" class="block text-sm font-medium text-gray-700">Nama Istri</label>
            <input type="text" id="nama_istri" name="nama_istri" value="{{ old('nama_istri') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nama_istri')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tempat_lahir_istri" class="block text-sm font-medium text-gray-700">Tempat Lahir Istri</label>
            <input type="text" id="tempat_lahir_istri" name="tempat_lahir_istri" value="{{ old('tempat_lahir_istri') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('tempat_lahir_istri')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir_istri" class="block text-sm font-medium text-gray-700">Tanggal Lahir Istri</label>
            <input type="date" id="tanggal_lahir_istri" name="tanggal_lahir_istri"
                value="{{ old('tanggal_lahir_istri') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required oninput="hitungUmur('tanggal_lahir_istri', 'umur_istri')">
            @error('tanggal_lahir_istri')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="umur_istri" class="block text-sm font-medium text-gray-700">Umur Istri</label>
            <input type="number" id="umur_istri" name="umur_istri" value="{{ old('umur_istri') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                readonly>
            @error('umur_istri')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jumlah_anak" class="block text-sm font-medium text-gray-700">Jumlah Anak</label>
            <input type="number" id="jumlah_anak" name="jumlah_anak" value="{{ old('jumlah_anak') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('jumlah_anak')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jenis_kb" class="block text-sm font-medium text-gray-700">Jenis KB:</label>
            <input type="text" id="jenis_kb" name="jenis_kb" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('jenis_kb')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
        </div>
    </form>

    <script>
        function hitungUmur(tanggalLahirId, umurId) {
            const tanggalLahir = document.getElementById(tanggalLahirId).value;
            const umurInput = document.getElementById(umurId);

            if (tanggalLahir) {
                const today = new Date();
                const birthDate = new Date(tanggalLahir);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                umurInput.value = age;
            }
        }
    </script>
@endsection
