@extends('dashboard')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6">Detail Data Anak</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Tombol Navigasi -->
    <div class="mb-4">
        <a href="{{ route('data-anak.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar</a>
        <a href="{{ route('pemeriksaan.create', ['nama' => $dataAnak->nama]) }}"
            class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 ml-2">Tambah Data Pemeriksaan</a>
            <x-cetak></x-cetak>

    </div>
    <form action="{{ route('data-anak.index') }}" method="GET" class="w-full max-w-sm">
        <div class="flex items-center mb-4">
            <input type="date" name="created_at" value="{{ request('created_at') }}"
                class="border border-gray-300 px-4 py-2 rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
        </div>
    </form>
    <!-- Detail Data Anak -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- <div>
                <h2 class="text-xl font-semibold">No KK:</h2>
                <p>{{ $dataAnak->no_kk }}</p>
            </div> -->
            <div>
                <h2 class="text-xl font-semibold">Jenis Kelamin:</h2>
                <p>{{ $dataAnak->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">NIK:</h2>
                <p>{{ $dataAnak->nik }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Umur:</h2>
                <p>{{ $dataAnak->umur }} tahun</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama:</h2>
                <p>{{ $dataAnak->nama }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama Ayah:</h2>
                <p>{{ $dataAnak->nama_ayah }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tempat Lahir:</h2>
                <p>{{ $dataAnak->tempat_lahir }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Nama Ibu:</h2>
                <p>{{ $dataAnak->nama_ibu }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold">Tanggal Lahir:</h2>
                <p>{{ \Carbon\Carbon::parse($dataAnak->tanggal_lahir)->format('d-m-Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pemeriksaan -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm table-auto">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Periksa</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Kepala
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PMT</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imunisasi
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pemeriksaans as $index => $pemeriksaan)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4">{{ $pemeriksaan->berat_badan }} kg</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->tinggi_badan }} cm</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->lingkar_kepala }} cm</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->gizi }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->imunisasi }}</td>
                        <td class="px-6 py-4">{{ $pemeriksaan->catatan }}</td>
                        <td class="px-6 py-4">
                            <!-- Tombol Edit -->
                            <a href="{{ route('pemeriksaan.edit', ['nama' => $dataAnak->nama]) }}"
                                class="text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487a2.25 2.25 0 113.182 3.182L7.923 19.79a4.5 4.5 0 01-1.689 1.079l-4.07 1.357 1.357-4.07a4.5 4.5 0 011.079-1.689l12.12-12.12z" />
                                </svg>
                            </a>
                            <!-- Separator -->
                            |
                            <!-- Tombol Hapus -->
                            <form action="{{ route('pemeriksaan.destroy', $pemeriksaan->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 9.75l-.868 9.552a2.25 2.25 0 01-2.243 2.198H7.611a2.25 2.25 0 01-2.243-2.198L4.5 9.75m15 0H4.5m15 0L19.5 6a2.25 2.25 0 00-2.25-2.25h-10.5A2.25 2.25 0 004.5 6m15 3.75H4.5" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <!-- Baris Kosong -->
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
