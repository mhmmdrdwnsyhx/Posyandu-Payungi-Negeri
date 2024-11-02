@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Data Ibu Hamil</h1>

    <form action="{{ route('data-ibu-hamil.update', $dataIbuHamil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- No. KK -->
        <!-- <div class="mb-4">
            <label for="no_kk" class="block text-sm font-medium text-gray-700">No. KK</label>
            <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $dataIbuHamil->no_kk) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('no_kk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> -->

        <!-- NIK -->
        <div class="mb-4">
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" name="nik" id="nik" value="{{ old('nik', $dataIbuHamil->nik) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('nik')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $dataIbuHamil->nama) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-4">
            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir"
                value="{{ old('tempat_lahir', $dataIbuHamil->tempat_lahir) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('tempat_lahir')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                value="{{ old('tanggal_lahir', $dataIbuHamil->tanggal_lahir) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                required>
            @error('tanggal_lahir')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Umur -->
        <div class="mb-4">
            <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
            <input type="text" name="umur" id="umur" value="{{ old('umur', $dataIbuHamil->umur) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('umur')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nama Suami -->
        <div class="mb-4">
            <label for="nama_suami" class="block text-sm font-medium text-gray-700">Nama Suami</label>
            <input type="text" name="nama_suami" id="nama_suami"
                value="{{ old('nama_suami', $dataIbuHamil->nama_suami) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('nama_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Mengandung Anak Ke -->
        <div class="mb-4">
            <label for="mengandung_anak_ke" class="block text-sm font-medium text-gray-700">Mengandung Anak Ke</label>
            <input type="text" name="mengandung_anak_ke" id="mengandung_anak_ke"
                value="{{ old('mengandung_anak_ke', $dataIbuHamil->mengandung_anak_ke) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @error('mengandung_anak_ke')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan
                Perubahan</button>
        </div>
    </form>
@endsection
