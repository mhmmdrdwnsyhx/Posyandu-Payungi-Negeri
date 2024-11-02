@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Data Push</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Form Edit Data Push -->
    <form action="{{ route('data-push.update', $dataPush->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- <div class="mb-4">
            <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
            <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $dataPush->no_kk) }}"
                class="mt-1 block w-full">
        </div> -->

        <div class="mb-4">
            <label for="nik_suami" class="block text-sm font-medium text-gray-700">NIK Suami</label>
            <input type="text" name="nik_suami" id="nik_suami" value="{{ old('nik_suami', $dataPush->nik_suami) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="nama_suami" class="block text-sm font-medium text-gray-700">Nama Suami</label>
            <input type="text" name="nama_suami" id="nama_suami" value="{{ old('nama_suami', $dataPush->nama_suami) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="tempat_lahir_suami" class="block text-sm font-medium text-gray-700">Tempat Lahir Suami</label>
            <input type="text" name="tempat_lahir_suami" id="tempat_lahir_suami"
                value="{{ old('tempat_lahir_suami', $dataPush->tempat_lahir_suami) }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir_suami" class="block text-sm font-medium text-gray-700">Tanggal Lahir Suami</label>
            <input type="date" name="tanggal_lahir_suami" id="tanggal_lahir_suami"
                value="{{ old('tanggal_lahir_suami', $dataPush->tanggal_lahir_suami) }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="umur_suami" class="block text-sm font-medium text-gray-700">Umur Suami</label>
            <input type="number" name="umur_suami" id="umur_suami" value="{{ old('umur_suami', $dataPush->umur_suami) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="nik_istri" class="block text-sm font-medium text-gray-700">NIK Istri</label>
            <input type="text" name="nik_istri" id="nik_istri" value="{{ old('nik_istri', $dataPush->nik_istri) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="nama_istri" class="block text-sm font-medium text-gray-700">Nama Istri</label>
            <input type="text" name="nama_istri" id="nama_istri" value="{{ old('nama_istri', $dataPush->nama_istri) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="tempat_lahir_istri" class="block text-sm font-medium text-gray-700">Tempat Lahir Istri</label>
            <input type="text" name="tempat_lahir_istri" id="tempat_lahir_istri"
                value="{{ old('tempat_lahir_istri', $dataPush->tempat_lahir_istri) }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir_istri" class="block text-sm font-medium text-gray-700">Tanggal Lahir Istri</label>
            <input type="date" name="tanggal_lahir_istri" id="tanggal_lahir_istri"
                value="{{ old('tanggal_lahir_istri', $dataPush->tanggal_lahir_istri) }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="umur_istri" class="block text-sm font-medium text-gray-700">Umur Istri</label>
            <input type="number" name="umur_istri" id="umur_istri" value="{{ old('umur_istri', $dataPush->umur_istri) }}"
                class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="jumlah_anak" class="block text-sm font-medium text-gray-700">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" id="jumlah_anak"
                value="{{ old('jumlah_anak', $dataPush->jumlah_anak) }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="pemasang_kb" class="block text-sm font-medium text-gray-700">Pemasang KB (Suami atau
                Istri)</label>
            <select name="pemasang_kb" id="pemasang_kb" class="mt-1 block w-full">
                <option value="suami" {{ old('pemasang_kb', $dataPush->pemasang_kb) == 'suami' ? 'selected' : '' }}>Suami
                </option>
                <option value="istri" {{ old('pemasang_kb', $dataPush->pemasang_kb) == 'istri' ? 'selected' : '' }}>Istri
                </option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
