@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Daftar Pemeriksaan</h1>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('pemeriksaan.create', ['dataAnakId' => request()->input('data_anak_id')]) }}"
        class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 mb-6">Tambah Data Pemeriksaan</a>

    <!-- Tabel Data Pemeriksaan -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Periksa</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badansss
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Kepala
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gizi</th>
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
                            <a href="{{ route('pemeriksaan.edit', $pemeriksaan->id) }}"
                                class="text-blue-500 hover:text-blue-700">Edit</a> |
                            <form action="{{ route('pemeriksaan.destroy', $pemeriksaan->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
