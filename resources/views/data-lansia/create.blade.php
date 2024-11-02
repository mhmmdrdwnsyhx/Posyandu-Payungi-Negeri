@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Tambah Data Lansia</h1>

    <form action="{{ route('data-lansia.store') }}" method="POST">
        @csrf
        <!-- <div class="mb-4">
            <label for="no_kk" class="block text-gray-700 font-bold mb-2">No. KK</label>
            <input type="text" name="no_kk" id="no_kk" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                value="{{ old('no_kk') }}" required>
            @error('no_kk')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div> -->

        <div class="mb-4">
            <label for="nik" class="block text-gray-700 font-bold mb-2">NIK</label>
            <input type="text" name="nik" id="nik" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                value="{{ old('nik') }}" required>
            @error('nik')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                value="{{ old('nama') }}" required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tempat_lahir" class="block text-gray-700 font-bold mb-2">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                value="{{ old('tempat_lahir') }}" required>
            @error('tempat_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-gray-700 font-bold mb-2">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="w-full px-3 py-2 border rounded-lg shadow-sm" value="{{ old('tanggal_lahir') }}" required
                onchange="calculateAge()">
            @error('tanggal_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="umur" class="block text-gray-700 font-bold mb-2">Umur</label>
            <input type="text" name="umur" id="umur" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                value="{{ old('umur') }}" readonly>
            @error('umur')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-gray-700 font-bold mb-2">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="w-full px-3 py-2 border rounded-lg shadow-sm" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="riwayat_penyakit" class="block text-gray-700 font-bold mb-2">Alamat</label>
            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="w-full px-3 py-2 border rounded-lg shadow-sm"
                rows="4">{{ old('riwayat_penyakit') }}</textarea>
            @error('riwayat_penyakit')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>

    <script>
        function calculateAge() {
            const birthDate = new Date(document.getElementById('tanggal_lahir').value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('umur').value = age;
        }

        // Tambahkan event listener pada halaman load untuk menghitung umur jika tanggal lahir sudah diisi
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('tanggal_lahir').value) {
                calculateAge();
            }
        });
    </script>
@endsection
