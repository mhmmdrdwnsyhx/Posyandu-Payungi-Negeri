@extends('dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Data PUS</h1>

    <form action="{{ route('data-push.store') }}" method="POST">
        @csrf
        <!-- kayaknya ini ga dipake -->
        <!-- No. KK -->
        <div class="mb-4">
            <label for="no_kk" class="block text-gray-700">No. KK</label>
            <input type="text" name="no_kk" id="no_kk" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- NIK Suami -->
        <div class="mb-4">
            <label for="nik_suami" class="block text-gray-700">NIK Suami</label>
            <input type="text" name="nik_suami" id="nik_suami" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Nama Suami -->
        <div class="mb-4">
            <label for="nama_suami" class="block text-gray-700">Nama Suami</label>
            <input type="text" name="nama_suami" id="nama_suami" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Tempat Lahir Suami -->
        <div class="mb-4">
            <label for="tempat_lahir_suami" class="block text-gray-700">Tempat Lahir Suami</label>
            <input type="text" name="tempat_lahir_suami" id="tempat_lahir_suami"
                class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Tanggal Lahir Suami -->
        <div class="mb-4">
            <label for="tanggal_lahir_suami" class="block text-gray-700">Tanggal Lahir Suami</label>
            <input type="date" name="tanggal_lahir_suami" id="tanggal_lahir_suami"
                class="border border-gray-300 p-2 w-full" oninput="hitungUmur('tanggal_lahir_suami', 'umur_suami')">
        </div>

        <!-- Umur Suami -->
        <div class="mb-4">
            <label for="umur_suami" class="block text-gray-700">Umur Suami</label>
            <input type="number" name="umur_suami" id="umur_suami" class="border border-gray-300 p-2 w-full" readonly>
        </div>

        <!-- NIK Istri -->
        <div class="mb-4">
            <label for="nik_istri" class="block text-gray-700">NIK Istri</label>
            <input type="text" name="nik_istri" id="nik_istri" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Nama Istri -->
        <div class="mb-4">
            <label for="nama_istri" class="block text-gray-700">Nama Istri</label>
            <input type="text" name="nama_istri" id="nama_istri" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Tempat Lahir Istri -->
        <div class="mb-4">
            <label for="tempat_lahir_istri" class="block text-gray-700">Tempat Lahir Istri</label>
            <input type="text" name="tempat_lahir_istri" id="tempat_lahir_istri"
                class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Tanggal Lahir Istri -->
        <div class="mb-4">
            <label for="tanggal_lahir_istri" class="block text-gray-700">Tanggal Lahir Istri</label>
            <input type="date" name="tanggal_lahir_istri" id="tanggal_lahir_istri"
                class="border border-gray-300 p-2 w-full" oninput="hitungUmur('tanggal_lahir_istri', 'umur_istri')">
        </div>

        <!-- Umur Istri -->
        <div class="mb-4">
            <label for="umur_istri" class="block text-gray-700">Umur Istri</label>
            <input type="number" name="umur_istri" id="umur_istri" class="border border-gray-300 p-2 w-full" readonly>
        </div>

        <!-- Jumlah Anak -->
        <div class="mb-4">
            <label for="jumlah_anak" class="block text-gray-700">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" id="jumlah_anak" class="border border-gray-300 p-2 w-full">
        </div>

        <!-- Pemasang KB -->
        <div class="mb-4">
            <label for="pemasang_kb" class="block text-gray-700">Pemasang KB (Suami atau Istri)</label>
            <select name="pemasang_kb" id="pemasang_kb" class="border border-gray-300 p-2 w-full">
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
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
