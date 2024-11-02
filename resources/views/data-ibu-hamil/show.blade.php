@extends('dashboard')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6">Detail Data Ibu Hamil</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        
    @endif

    <!-- Tombol Navigasi -->
    <div class="mb-4">
        <a href="{{ route('data-ibu-hamil.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar</a>
        <a href="{{ route('data-pemeriksaan.create', ['ibu_hamil' => $ibuHamil->nama]) }}"
            class="inline-block bg-blue-500 text-white px-6 py-3 mb-3 ml-1 rounded hover:bg-blue-600">Tambah Data
            Pemeriksaan</a>
            <form action="{{ route('data-anak.index') }}" method="GET" class="w-full mb-3 max-w-sm">
                <div class="flex items-center">
                    <input type="date" name="created_at" value="{{ request('created_at') }}"
                        class="border border-gray-300 px-4 py-2 rounded ml-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
                </div>
            </form>
            <x-cetak></x-cetak>

    </div>

    <!-- Detail Data Ibu Hamil -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- <div>
                <h2 class="text-xl font-semibold">No KK:</h2>
                <p>{{ $ibuHamil->no_kk }}</p>
            </div> -->
            <div>
                <h2 class="text-xl font-semibold">NIK:</h2>
                <p>{{ $ibuHamil->nik }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama:</h2>
                <p>{{ $ibuHamil->nama }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tempat Lahir:</h2>
                <p>{{ $ibuHamil->tempat_lahir }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tanggal Lahir:</h2>
                <p>{{ \Carbon\Carbon::parse($ibuHamil->tanggal_lahir)->format('d-m-Y') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Umur:</h2>
                <p>{{ $ibuHamil->umur }}</p>
            </div>
            <!-- <div>
                <h2 class="text-xl font-semibold">Nama Suami:</h2>
                <p>{{ $ibuHamil->nama_suami }}</p>
            </div> -->
            <div>
                <h2 class="text-xl font-semibold">Mengandung Anak Ke-:</h2>
                <p>{{ $ibuHamil->mengandung_anak_ke }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pemeriksaan -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6">
        <h2 class="text-2xl font-semibold mb-4">Daftar Data Pemeriksaan</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Periksa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TFU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran Lila</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia
                        Kandungan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PMT</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($ibuHamil->dataPemeriksaan as $index => $pemeriksaan)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->berat_badan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->tensi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->ukuran_lila }} cm</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->usia_kandungan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->gizi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->catatan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <a href="{{ route('data-pemeriksaan.edit', $pemeriksaan->id) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('data-pemeriksaan.destroy', $pemeriksaan->id) }}" method="POST"
                                class="inline" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data pemeriksaan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            function confirmDelete() {
                return confirm('Ingin menghapus data?');
            }
        </script>
    @endpush
@endsection
