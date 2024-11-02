@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Data Pemeriksaan</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Form Edit Data Pemeriksaan -->
    <form action="{{ route('data-pemeriksaan.update', $dataPemeriksaan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="tanggal_pemeriksaan" class="block text-sm font-medium text-gray-700">Tanggal
                        Pemeriksaan</label>
                    <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="mt-1 block w-full"
                        value="{{ old('tanggal_pemeriksaan', $dataPemeriksaan->tanggal_pemeriksaan) }}" required>
                </div>
                <div>
                    <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan</label>
                    <input type="number" step="0.01" name="berat_badan" id="berat_badan" class="mt-1 block w-full"
                        value="{{ old('berat_badan', $dataPemeriksaan->berat_badan) }}" required>
                </div>
                <div>
                    <label for="tensi" class="block text-sm font-medium text-gray-700">TFU</label>
                    <input type="text" name="tensi" id="tensi" class="mt-1 block w-full"
                        value="{{ old('tensi', $dataPemeriksaan->tensi) }}" required>
                </div>
                <div>
                    <label for="tensi" class="block text-sm font-medium text-gray-700">Ukuran Lila</label>
                    <input type="text" name="ukuran_lila" id="tensi" class="mt-1 block w-full" 
                        value="{{ old('ukuran_lila', $dataPemeriksaan->ukuran_lila) }}"required>
                </div>
                <div>
                    <label for="usia_kandungan" class="block text-sm font-medium text-gray-700">Usia Kandungan</label>
                    <input type="number" name="usia_kandungan" id="usia_kandungan" class="mt-1 block w-full"
                        value="{{ old('usia_kandungan', $dataPemeriksaan->usia_kandungan) }}" required>
                </div>
                <div>
                    <label for="gizi" class="block text-sm font-medium text-gray-700">Gizi</label>
                    <textarea name="gizi" id="gizi" class="mt-1 block w-full" required>{{ old('gizi', $dataPemeriksaan->gizi) }}</textarea>
                </div>
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                    <textarea name="catatan" id="catatan" class="mt-1 block w-full">{{ old('catatan', $dataPemeriksaan->catatan) }}</textarea>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button type="submit"
                class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Simpan</button>
        </div>
    </form>

    @if ($dataPemeriksaan->ibuHamil)
    <a href="{{ route('data-ibu-hamil.show', ['nama' => $dataPemeriksaan->ibuHamil->nama]) }}"
        class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali</a>
    @else
        <p class="text-red-500">Data Ibu Hamil tidak ditemukan.</p>
    @endif


@endsection
