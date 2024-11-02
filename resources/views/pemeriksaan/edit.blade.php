@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Pemeriksaan</h1>

    <!-- Menampilkan pesan sukses atau error -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Ada kesalahan!</strong>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemeriksaan.update', ['nama' => $dataAnak->nama]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="data_anak_id" value="{{ $dataAnak->id }}">

        <!-- Form fields for editing the examination -->
        <div class="mb-4">
            <label for="tanggal_periksa" class="block text-gray-700">Tanggal Periksa</label>
            <input type="date" id="tanggal_periksa" name="tanggal_periksa"
                value="{{ old('tanggal_periksa', $pemeriksaan->tanggal_periksa) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required>
        </div>
        <div class="mb-4">
            <label for="berat_badan" class="block text-gray-700">Berat Badan (kg)</label>
            <input type="number" id="berat_badan" name="berat_badan"
                value="{{ old('berat_badan', $pemeriksaan->berat_badan) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required step="0.1">
        </div>
        <div class="mb-4">
            <label for="tinggi_badan" class="block text-gray-700">Tinggi Badan (cm)</label>
            <input type="number" id="tinggi_badan" name="tinggi_badan"
                value="{{ old('tinggi_badan', $pemeriksaan->tinggi_badan) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required step="0.1">
        </div>
        <div class="mb-4">
            <label for="lingkar_kepala" class="block text-gray-700">Lingkar Kepala</label>
            <input type="number" id="lingkar_kepala" name="lingkar_kepala"
                value="{{ old('lingkar_kepala', $pemeriksaan->lingkar_kepala) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required step="0.1">
        </div>
        <div class="mb-4">
            <label for="gizi" class="block text-gray-700">Gizi</label>
            <input type="text" id="gizi" name="gizi" value="{{ old('gizi', $pemeriksaan->gizi) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required>
        </div>
        <div class="mb-4">
            <label for="imunisasi" class="block text-gray-700">Imunisasi</label>
            <input type="text" id="imunisasi" name="imunisasi" value="{{ old('imunisasi', $pemeriksaan->imunisasi) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required>
        </div>
        <div class="mb-4">
            <label for="catatan" class="block text-gray-700">Catatan</label>
            <textarea id="catatan" name="catatan"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                rows="4">{{ old('catatan', $pemeriksaan->catatan) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
@endsection
