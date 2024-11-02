@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Lansia</h1>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">

    <style>
        /* CSS tambahan untuk tampilan alamat */
        .print-only {
            word-wrap: break-word; /* Memungkinkan teks terputus jika panjang */
            min-width: 200px; /* Lebar minimum kolom */
            max-width: 300px; /* Lebar maksimum kolom */
        }
    </style>

    <div class="mb-5">
        <!-- Menggunakan komponen tombol tambah data -->
        <x-add-button route="{{ route('data-lansia.create') }}"> </x-add-button>
        <!-- Tombol rekap pemeriksaan lansia -->
        <button onclick="window.print()" class="bg-green-500 text-white px-6 py-3 rounded ml-2">Rekap Data</button>
    </div>

    <div class="flex items-center justify-between mb-6">
        <!-- Form Filter berdasarkan Tanggal -->
        <form action="{{ route('data-lansia.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="date" name="created_at" value="{{ request('created_at') }}" 
                       class="border border-gray-300 px-4 py-2 rounded ml-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>

        <!-- Form Pencarian berdasarkan ID Peserta -->
        <form action="{{ route('data-lansia.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Cari berdasarkan ID Peserta atau Nama" 
                       value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>
    </div>

    <div class="mt-4 mb-4">
        {{ $dataLansia->links() }}
    </div>

    <!-- Kontainer khusus cetak -->
    <div class="print-container">
        <div class="print-title">Posyandu Payungi Negeri</div>
        <div class="print-address">Jl. Melati Gg. Surya No. 69 Kelurahan Sukajadi, Kecamatan Sukajadi, Kota Pekanbaru, Riau</div>
        <div class="print-subtitle">Data Lansia Posyandu Payungi Negeri</div>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-center">No</th>
                        <th class="px-6 py-3 border-b text-center">Id Peserta</th>
                        <th class="px-6 py-3 border-b text-center">Nama</th>
                        <th class="px-6 py-3 border-b text-center">Jenis Kelamin</th>
                        <th class="px-6 py-3 border-b text-center">Umur</th>
                        <!-- Kolom tambahan yang hanya muncul saat cetak -->
                        <th class="px-6 py-3 border-b text-center print-only">NIK</th>
                        <th class="px-6 py-3 border-b text-center print-only">Tempat Lahir</th>
                        <th class="px-6 py-3 border-b text-center print-only">Tanggal Lahir</th>
                        <th class="px-6 py-3 border-b text-center print-only">Alamat</th>
                        <th class="px-6 py-3 border-b text-center no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataLansia as $index => $lansia)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b text-center">
                                {{ $index + 1 + ($dataLansia->currentPage() - 1) * $dataLansia->perPage() }}
                            </td>
                            <td class="px-6 py-4 border-b text-center">{{ $lansia->formatted_id }}</td>
                            <!-- <td class="px-6 py-4 border-b text-center">{{ 'DL' . substr($lansia->id, 0, 8) }}</td> -->
                            <td class="px-6 py-4 border-b text-center">{{ $lansia->nama }}</td>
                            <td class="px-6 py-4 border-b text-center">{{ $lansia->jenis_kelamin }}</td>
                            <td class="px-6 py-4 border-b text-center">{{ \Carbon\Carbon::parse($lansia->tanggal_lahir)->age }}</td>
                            <!-- Data tambahan yang hanya muncul saat cetak -->
                            <td class="px-6 py-4 border-b text-center print-only">{{ $lansia->nik }}</td>
                            <td class="px-6 py-4 border-b text-center print-only">{{ $lansia->tempat_lahir }}</td>
                            <td class="px-6 py-4 border-b text-center print-only">{{ \Carbon\Carbon::parse($lansia->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 border-b text-center print-only">{{ $lansia->riwayat_penyakit }}</td>
                            <td class="px-6 py-4 border-b text-center no-print">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('data-lansia.show', $lansia->id) }}" class="text-blue-600 hover:underline">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('data-lansia.edit', $lansia->id) }}" class="text-yellow-600 hover:underline">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <x-delete-button :route="route('data-lansia.destroy', $lansia->id)" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $dataLansia->links() }}
    </div>
@endsection
