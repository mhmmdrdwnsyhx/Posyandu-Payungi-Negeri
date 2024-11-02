@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Data Pemeriksaan Push</h1>

    <!-- Form Edit Data Pemeriksaan Push -->
    <form action="{{ route('pemeriksaan-push.update', $pemeriksaanPush->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="data_push_id" value="{{ $pemeriksaanPush->data_push_id }}">

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="tanggal_periksa" class="block text-sm font-medium text-gray-700">Tanggal Periksa:</label>
                <input type="date" id="tanggal_periksa" name="tanggal_periksa"
                    value="{{ $pemeriksaanPush->tanggal_periksa->format('Y-m-d') }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan:</label>
                <input type="number" id="berat_badan" name="berat_badan" step="0.01"
                    value="{{ $pemeriksaanPush->berat_badan }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="tensi" class="block text-sm font-medium text-gray-700">Tensi:</label>
                <input type="text" id="tensi" name="tensi" value="{{ $pemeriksaanPush->tensi }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="jenis_kb" class="block text-sm font-medium text-gray-700">Jenis KB:</label>
                <input type="text" id="jenis_kb" name="jenis_kb" value="{{ $pemeriksaanPush->jenis_kb }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan:</label>
                <textarea id="catatan" name="catatan" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $pemeriksaanPush->catatan }}</textarea>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            <a href="{{ route('data-push.show', $pemeriksaanPush->data_push_id) }}"
                class="ml-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
    </form>
@endsection
