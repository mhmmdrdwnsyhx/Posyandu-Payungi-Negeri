@extends('dashboard')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6">Detail Data Lansia</h1>

    <!-- Tombol Navigasi -->
    <div class="mb-4">
        <a href="{{ route('data-lansia.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar</a>
    </div>

    <!-- Detail Data Lansia -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Detail Data Lansia -->
            <div>
                <h2 class="text-xl font-semibold mb-2">No KK:</h2>
                <p class="text-gray-700">{{ $dataLansia->no_kk }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">NIK:</h2>
                <p class="text-gray-700">{{ $dataLansia->nik }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Nama:</h2>
                <p class="text-gray-700">{{ $dataLansia->nama }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Tempat Lahir:</h2>
                <p class="text-gray-700">{{ $dataLansia->tempat_lahir }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Tanggal Lahir:</h2>
                <p class="text-gray-700">{{ \Carbon\Carbon::parse($dataLansia->tanggal_lahir)->format('d-m-Y') }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Umur:</h2>
                <p class="text-gray-700">{{ \Carbon\Carbon::parse($dataLansia->tanggal_lahir)->age }} tahun</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Jenis Kelamin:</h2>
                <p class="text-gray-700">{{ $dataLansia->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-2">Riwayat Penyakit:</h2>
                <p class="text-gray-700">{{ $dataLansia->riwayat_penyakit }}</p>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah Data Pemeriksaan -->
    <div class="mb-4">
        <a href="{{ route('data-pemeriksaan-lansia.create', $dataLansia->id) }}" 
            class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Tambah Data Pemeriksaan</a>
    </div>

    <!-- Tabel Data Pemeriksaan -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6">
        <h2 class="text-2xl font-bold mb-4">Riwayat Pemeriksaan</h2>
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-200 text-gray-600 text-left text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Tanggal Periksa</th>
                    <th class="py-3 px-6">Berat Badan</th>
                    <th class="py-3 px-6">Tensi</th>
                    <th class="py-3 px-6">Usia Kandungan</th>
                    <th class="py-3 px-6">Gizi</th>
                    <th class="py-3 px-6">Catatan</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($dataLansia->pemeriksaans as $pemeriksaan)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $loop->iteration }}</td>
                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d-m-Y') }}</td>
                        <td class="py-3 px-6">{{ $pemeriksaan->berat_badan }} kg</td>
                        <td class="py-3 px-6">{{ $pemeriksaan->tensi }} mmHg</td>
                        <td class="py-3 px-6">{{ $pemeriksaan->usia_kandungan }} minggu</td>
                        <td class="py-3 px-6">{{ $pemeriksaan->gizi }}</td>
                        <td class="py-3 px-6">{{ $pemeriksaan->catatan }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('data-pemeriksaan-lansia.edit', $pemeriksaan->id) }}" 
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('data-pemeriksaan-lansia.destroy', $pemeriksaan->id) }}" method="POST" 
                                class="inline-block" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-3 px-6">Belum ada data pemeriksaan.</td>
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
