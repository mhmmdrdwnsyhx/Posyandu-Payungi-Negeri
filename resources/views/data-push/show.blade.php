@extends('dashboard')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6">Detail Data PUS</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Tombol Navigasi -->
    <div class="mb-4">
        <a href="{{ route('data-push.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar</a>
        <a href="{{ route('data-push.edit', $dataPush->id) }}"
            class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 ml-2">Edit Data</a>
        <!-- <a href="{{ route('pemeriksaan-push.create', $dataPush->id) }}"
            class="inline-block bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 ml-2">Tambah Data Pemeriksaan
            PUS</a> -->
        <x-cetak></x-cetak>
    </div>

    <!-- Detail Data Push -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold">NIK Istri:</h2>
                <p>{{ $dataPush->nik_istri }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">NIK Suami:</h2>
                <p>{{ $dataPush->nik_suami }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama Istri:</h2>
                <p>{{ $dataPush->nama_istri }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama Suami:</h2>
                <p>{{ $dataPush->nama_suami }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tempat Lahir Istri:</h2>
                <p>{{ $dataPush->tempat_lahir_istri }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tempat Lahir Suami:</h2>
                <p>{{ $dataPush->tempat_lahir_suami }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tanggal Lahir Istri:</h2>
                <p>{{ \Carbon\Carbon::parse($dataPush->tanggal_lahir_istri)->format('d-m-Y') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tanggal Lahir Suami:</h2>
                <p>{{ \Carbon\Carbon::parse($dataPush->tanggal_lahir_suami)->format('d-m-Y') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Umur Istri:</h2>
                <p>{{ $dataPush->umur_istri }} tahun</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Umur Suami:</h2>
                <p>{{ $dataPush->umur_suami }} tahun</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Jumlah Anak:</h2>
                <p>{{ $dataPush->jumlah_anak }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Jenis KB:</h2>
                <p>{{ $dataPush->jenis_kb }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Pemeriksaan Push -->
    <!-- <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm table-auto">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Periksa</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tensi</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis KB</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPush->pemeriksaanPushes as $index => $pemeriksaan)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4">{{ $pemeriksaan->berat_badan }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->tensi }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->jenis_kb }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->catatan }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('pemeriksaan-push.edit', $pemeriksaan->id) }}"
                                class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('pemeriksaan-push.destroy', $pemeriksaan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> -->
@endsection
