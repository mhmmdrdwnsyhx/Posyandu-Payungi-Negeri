@extends('dashboard')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6">Rekapan Pemeriksaan Posyandu</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Form Pencarian Tanggal -->
    <div class="mb-4">
        <form action="{{ route('rekapan-pemeriksaan.index') }}" method="GET" class="flex items-center">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border border-gray-300 px-4 py-2 rounded-l" placeholder="Cari berdasarkan tanggal">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">Cari</button>
        </form>
    </div>

    <!-- Tabel Data Pemeriksaan Anak -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Data Pemeriksaan Anak</h2>

        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm table-auto">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Anak</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Periksa</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Kepala (cm)</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PMT</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imunisasi</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pemeriksaans as $index => $pemeriksaan)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->anak->nama }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->berat_badan }} kg</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->tinggi_badan }} cm</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->lingkar_kepala }} cm</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->gizi }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->imunisasi }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->catatan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan posyandu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tabel Data Pemeriksaan Ibu Hamil -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Data Pemeriksaan Ibu Hamil</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Ibu Hamil</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Periksa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tensi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia Kandungan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PMT</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($datapemeriksaansibuhamil as $index => $pemeriksaan)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->ibuHamil->nama }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->berat_badan }} kg</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->tensi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->usia_kandungan }} minggu</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->gizi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->catatan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan ibu hamil.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tabel Pemeriksaan PUSH -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Data Pemeriksaan PUS</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Periksa</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tensi</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis KB</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($datapemeriksaanpush as $index => $pemeriksaan)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->berat_badan }} kg</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->tensi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->jenis_kb }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->catatan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan PUS.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
@endsection
