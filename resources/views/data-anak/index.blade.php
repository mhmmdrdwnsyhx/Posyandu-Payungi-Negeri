@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Anak</h1>

    <link rel="stylesheet" href="{{ asset('css/print.css') }}">

    <div class="mb-5">
        <x-add-button route="{{ route('data-anak.create') }}"></x-add-button>
        {{-- <x-cetak></x-cetak> --}}
        <!-- Tombol Rekap Data Pemeriksaan Anak -->
        <a href="{{ route('rekap-pemeriksaan.index') }}" class="bg-green-500 text-white px-6 py-3 rounded ml-2 hover:bg-green-600">
            Rekap Data Pemeriksaan Anak
        </a>
    </div>

    <div class="flex items-center justify-between mb-6">
        <!-- Tombol Cetak -->

        <!-- Form Filter berdasarkan Tanggal -->
        <form action="{{ route('data-anak.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="date" name="created_at" value="{{ request('created_at') }}"
                    class="border border-gray-300 px-4 py-2 rounded ml-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>

        <!-- Form Pencarian berdasarkan ID, Nama, dan Jenis Kelamin -->
        <form action="{{ route('data-anak.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Cari berdasarkan ID Peserta, Nama, atau Jenis Kelamin"
                    value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>
    </div>

    <div class="mt-4 mb-4">
        {{ $dataAnak->appends(request()->query())->links() }}
    </div>


    <!-- Container untuk judul, alamat, dan tabel -->
    <div class="print-container">
        <div class="print-title">Posyandu Pasar Kodim</div>
        <div class="print-address">Jalan Teratai No 94A</div>
        <div class="print-subtitle">Data Anak Posyandu Pasar Kodim</div>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-center">No</th>
                        <th class="px-6 py-3 border-b text-center">Id Peserta</th>
                        <th class="px-6 py-3 border-b text-center">Nama</th>
                        <th class="px-6 py-3 border-b text-center">Jenis Kelamin</th>
                        <th class="px-6 py-3 border-b text-center">Dibuat Tanggal</th>
                        <th class="px-6 py-3 border-b text-center no-print">Aksi</th> <!-- Tambahkan kelas no-print -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAnak as $index => $anak)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b text-center">
                                {{ $index + 1 + ($dataAnak->currentPage() - 1) * $dataAnak->perPage() }}</td>
                            <td class="px-6 py-4 border-b text-center">{{ $anak->id_peserta }}</td>
                            <td class="px-6 py-4 border-b text-center">{{ $anak->nama }}</td>
                            <td class="px-6 py-4 border-b text-center">
                                {{ $anak->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td class="px-6 py-4 border-b text-center">
                                {{ \Carbon\Carbon::parse($anak->created_at)->translatedFormat('l, d F Y') }}
                            </td>

                            <td class="px-6 py-4 border-b text-center no-print"> <!-- Tambahkan kelas no-print -->
                                <a href="{{ route('data-anak.show', $anak->nama) }}" class="text-blue-600 hover:underline">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('data-anak.edit', $anak->nama) }}"
                                    class="text-yellow-600 hover:underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Menggunakan komponen DeleteButton -->
                                <x-delete-button :route="route('data-anak.destroy', $anak->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
