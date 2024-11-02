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

    <h1 class="text-3xl font-bold mb-6 hide-print">Rekap Data Pemeriksaan Anak</h1>

    <div class="mb-4 flex justify-between items-center no-print">
        <a href="{{ route('data-anak.index') }}"
            class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Kembali ke Daftar Anak</a>
        <x-cetak></x-cetak>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('rekap-pemeriksaan.index') }}" method="GET" class="mb-4 no-print">
        <div class="flex items-center space-x-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="self-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Cari
                </button>
            </div>
        </div>
    </form>

    <!-- Informasi Pencarian untuk Cetakan -->
    <div class="print-only mb-4">
        <h2 class="text-center font-bold font-size-40">Posyandu Payungi Negeri</h2>
        <p class="text-center font-size-18">Jl. Melati Gg. Surya No. 69 Kelurahan Sukajadi, Kecamatan Sukajadi, Kota Pekanbaru, Riau</p>
        <h3 class="text-center font-size-20">Rekapan Data Pemeriksaan Anak</h3>
        <p class="text-center">Periode: 
            @if(request('start_date') && request('end_date'))
                {{ \Carbon\Carbon::parse(request('start_date'))->format('d-m-Y') }} sampai {{ \Carbon\Carbon::parse(request('end_date'))->format('d-m-Y') }}
            @else
                Semua periode
            @endif
        </p>
    </div>

    <!-- Tabel Data Pemeriksaan -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm table-auto">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                    Periksa</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No KK</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Anak</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tempat Lahir</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Ayah</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Ibu</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PMT</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imunisasi</th>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pemeriksaans as $index => $pemeriksaan)
                <tr class="border-b">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->translatedFormat('l, d F Y') }}
                    </td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->no_kk }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->nik }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->nama }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->tempat_lahir }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemeriksaan->dataAnak->tanggal_lahir)->translatedFormat('l, d F Y') }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->jenis_kelamin }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->umur }} tahun</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->nama_ayah }} </td>
                    <td class="px-6 py-4">{{ $pemeriksaan->dataAnak->nama_ibu }} </td>
                    <td class="px-6 py-4">{{ $pemeriksaan->berat_badan }} kg</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->tinggi_badan }} cm</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->gizi }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->imunisasi }}</td>
                    <td class="px-6 py-4">{{ $pemeriksaan->catatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="14" class="px-6 py-4 text-center text-gray-500">Belum ada data pemeriksaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
