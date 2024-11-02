@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Data PUS</h1>

    <form action="{{ route('data-push.update', $dataPush->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input No KK -->
        <!-- <div class="mb-4">
            <label for="no_kk" class="block text-gray-700">No KK</label>
            <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $dataPush->no_kk) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('no_kk') border-red-500 @enderror">
            @error('no_kk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> -->

        <!-- Input NIK Suami -->
        <div class="mb-4">
            <label for="nik_suami" class="block text-gray-700">NIK Suami</label>
            <input type="text" name="nik_suami" id="nik_suami" value="{{ old('nik_suami', $dataPush->nik_suami) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('nik_suami') border-red-500 @enderror">
            @error('nik_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Nama Suami -->
        <div class="mb-4">
            <label for="nama_suami" class="block text-gray-700">Nama Suami</label>
            <input type="text" name="nama_suami" id="nama_suami" value="{{ old('nama_suami', $dataPush->nama_suami) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('nama_suami') border-red-500 @enderror">
            @error('nama_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Tempat Lahir Suami -->
        <div class="mb-4">
            <label for="tempat_lahir_suami" class="block text-gray-700">Tempat Lahir Suami</label>
            <input type="text" name="tempat_lahir_suami" id="tempat_lahir_suami"
                value="{{ old('tempat_lahir_suami', $dataPush->tempat_lahir_suami) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('tempat_lahir_suami') border-red-500 @enderror">
            @error('tempat_lahir_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Tanggal Lahir Suami -->
        <div class="mb-4">
            <label for="tanggal_lahir_suami" class="block text-gray-700">Tanggal Lahir Suami</label>
            <input type="date" name="tanggal_lahir_suami" id="tanggal_lahir_suami"
                value="{{ old('tanggal_lahir_suami', $dataPush->tanggal_lahir_suami ? $dataPush->tanggal_lahir_suami->format('Y-m-d') : '') }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('tanggal_lahir_suami') border-red-500 @enderror">
            @error('tanggal_lahir_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Umur Suami -->
        <div class="mb-4">
            <label for="umur_suami" class="block text-gray-700">Umur Suami</label>
            <input type="number" name="umur_suami" id="umur_suami" value="{{ old('umur_suami', $dataPush->umur_suami) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('umur_suami') border-red-500 @enderror">
            @error('umur_suami')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input NIK Istri -->
        <div class="mb-4">
            <label for="nik_istri" class="block text-gray-700">NIK Istri</label>
            <input type="text" name="nik_istri" id="nik_istri" value="{{ old('nik_istri', $dataPush->nik_istri) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('nik_istri') border-red-500 @enderror">
            @error('nik_istri')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Nama Istri -->
        <div class="mb-4">
            <label for="nama_istri" class="block text-gray-700">Nama Istri</label>
            <input type="text" name="nama_istri" id="nama_istri" value="{{ old('nama_istri', $dataPush->nama_istri) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('nama_istri') border-red-500 @enderror">
            @error('nama_istri')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Tempat Lahir Istri -->
        <div class="mb-4">
            <label for="tempat_lahir_istri" class="block text-gray-700">Tempat Lahir Istri</label>
            <input type="text" name="tempat_lahir_istri" id="tempat_lahir_istri"
                value="{{ old('tempat_lahir_istri', $dataPush->tempat_lahir_istri) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('tempat_lahir_istri') border-red-500 @enderror">
            @error('tempat_lahir_istri')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Tanggal Lahir Istri -->
        <div class="mb-4">
            <label for="tanggal_lahir_istri" class="block text-gray-700">Tanggal Lahir Istri</label>
            <input type="date" name="tanggal_lahir_istri" id="tanggal_lahir_istri"
                value="{{ old('tanggal_lahir_istri', $dataPush->tanggal_lahir_istri ? $dataPush->tanggal_lahir_istri->format('Y-m-d') : '') }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('tanggal_lahir_istri') border-red-500 @enderror">
            @error('tanggal_lahir_istri')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Umur Istri -->
        <div class="mb-4">
            <label for="umur_istri" class="block text-gray-700">Umur Istri</label>
            <input type="number" name="umur_istri" id="umur_istri" value="{{ old('umur_istri', $dataPush->umur_istri) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('umur_istri') border-red-500 @enderror">
            @error('umur_istri')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Jumlah Anak -->
        <div class="mb-4">
            <label for="jumlah_anak" class="block text-gray-700">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" id="jumlah_anak" value="{{ old('jumlah_anak', $dataPush->jumlah_anak) }}"
                class="w-full border border-gray-300 px-4 py-2 rounded @error('jumlah_anak') border-red-500 @enderror">
            @error('jumlah_anak')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input Pemasang KB -->
        <!-- <div class="mb-4">
            <label for="pemasang_kb" class="block text-gray-700">Pemasang KB</label>
            <select name="pemasang_kb" id="pemasang_kb" class="w-full border border-gray-300 px-4 py-2 rounded @error('pemasang_kb') border-red-500 @enderror">
                <option value="">Pilih Pemasang KB</option>
                <option value="Suami" {{ old('pemasang_kb', $dataPush->pemasang_kb) == 'Suami' ? 'selected' : '' }}>Suami</option>
                <option value="Istri" {{ old('pemasang_kb', $dataPush->pemasang_kb) == 'Istri' ? 'selected' : '' }}>Istri</option>
            </select>
            @error('pemasang_kb')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> -->
        
        <!-- Jenis KB -->
        <div class="mb-4">
            <label for="jenis_kb" class="block text-sm font-medium text-gray-700">Jenis KB:</label>
            <input type="text" id="jenis_kb" name="jenis_kb" required
                value="{{ old('jenis_kb', $dataPush->jenis_kb) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('jenis_kb') border-red-500 @enderror">
            @error('jenis_kb')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Data
        </button>
    </form>
@endsection
