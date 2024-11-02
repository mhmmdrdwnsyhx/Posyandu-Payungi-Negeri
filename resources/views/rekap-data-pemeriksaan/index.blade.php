@extends('dashboard')

@section('content')
<style>
    @media print {
        .no-print {
            display: none !important;
        }
        .print-only {
            display: block !important;
        }
        .hide-print {
            display: none !important; /* Hides elements when printing */
        }
    }
    .print-only {
        display: none;
    }
    /* Custom font sizes for printing */
    .font-size-40 {
        font-size: 40px;
    }
    .font-size-18 {
        font-size: 18px;
    }
    .font-size-20 {
        font-size: 20px;
    }
</style>
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold mb-6 hide-print">Rekap Data Pemeriksaan Ibu Hamil</h1>

    <!-- Tombol Navigasi -->
    <div class="mb-4 no-print">
        <a href="{{ route('data-ibu-hamil.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar Ibu Hamil</a>
            <x-cetak></x-cetak>
    </div>

    <!-- Form Pencarian berdasarkan Tanggal -->
    <div class="mb-4 no-print">
        <form action="{{ request()->url() }}" method="GET" class="flex space-x-4">
            <input type="date" name="start_date" class="border border-gray-300 rounded p-2" placeholder="Tanggal Awal" value="{{ request('start_date') }}">
            <input type="date" name="end_date" class="border border-gray-300 rounded p-2" placeholder="Tanggal Akhir" value="{{ request('end_date') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Cari</button>
        </form>
    </div>

    <!-- Informasi Pencarian untuk Cetakan -->
    <div class="print-only mb-4">
        <h2 class="text-center font-bold font-size-40">Posyandu Payungi Negeri</h2>
        <p class="text-center font-size-18">Jl. Melati Gg. Surya No. 69 Kelurahan Sukajadi, Kecamatan Sukajadi, Kota Pekanbaru, Riau</p>
        <h3 class="text-center font-size-20">Rekapan Data Pemeriksaan Ibu Hamil</h3>
        <p class="text-center">Periode: 
            @if(request('start_date') && request('end_date'))
                {{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }} sampai dengan {{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}
            @else
                Semua periode
            @endif
        </p>
    </div>

    <!-- Tabel Gabungan Data Ibu Hamil dan Pemeriksaan -->
    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Rekap Data Pemeriksaan Ibu Hamil</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No KK</th> -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Ibu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tempat Lahir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Suami</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mengandung Anak Ke-</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Periksa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tensi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usia Kandungan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gizi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($ibuHamilList as $ibuHamil)
                    @forelse ($ibuHamil->dataPemeriksaan as $index => $pemeriksaan)
                        @if (
                            !request('start_date') && !request('end_date') || // Tampilkan semua data jika tidak ada tanggal yang dipilih
                            (request('start_date') && request('end_date') && 
                             \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->between(request('start_date'), request('end_date')))
                        )
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->parent->iteration }}</td>
                            <!-- <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->no_kk }}</td> -->
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->nik }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->nama }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->tempat_lahir }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($ibuHamil->tanggal_lahir)->translatedFormat('l, d F Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->umur }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->nama_suami }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $ibuHamil->mengandung_anak_ke }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_pemeriksaan)->translatedFormat('l, d F Y') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->berat_badan }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->tensi }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->usia_kandungan }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->gizi }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pemeriksaan->catatan }}</td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="15" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data pemeriksaan untuk {{ $ibuHamil->nama }}</td>
                        </tr>
                    @endforelse
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
