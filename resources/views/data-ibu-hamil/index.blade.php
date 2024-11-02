@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data Ibu Hamil</h1>

    <link rel="stylesheet" href="{{ asset('css/print.css') }}">

    <div class="mb-5">
        <x-add-button route="{{ route('data-ibu-hamil.create') }}"> </x-add-button>
        {{-- <x-cetak></x-cetak> --}}
        <a href="{{ route('rekap-data-pemeriksaan') }}" class="bg-green-500 text-white px-6 py-3 rounded ml-2 hover:bg-green-600">Rekap Data Pemeriksaan Ibu Hamil</a>
    </div>

    <div class="flex items-center justify-between mb-6">
        <!-- Tombol Cetak -->
        <!-- Form Filter berdasarkan Tanggal -->
        <form action="{{ route('data-ibu-hamil.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="date" name="created_at" value="{{ request('created_at') }}"
                    class="border border-gray-300 px-4 py-2 rounded ml-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>

        <!-- Form Pencarian berdasarkan ID, Nama, dan Jenis Kelamin -->
        <form action="{{ route('data-ibu-hamil.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Cari berdasarkan ID Peserta, Nama, atau Jenis Kelamin"
                    value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>
    </div>
    <div class="mt-4 mb-4">
        {{ $dataIbuHamil->appends(request()->query())->links() }}
    </div>

    <div class="print-container">
        <div class="print-title">Posyandu Pasar Kodim</div>
        <div class="print-address">Jalan Teratai No 94A</div>
        <div class="print-subtitle">Data Ibu Hamil Posyandu Pasar Kodim</div>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-center">No</th>
                        <th class="px-6 py-3 border-b text-center">Id Peserta</th>
                        <th class="px-6 py-3 border-b text-center">Nama</th>
                        <th class="px-6 py-3 border-b text-center">Dibuat Tanggal</th>
                        <th class="px-6 py-3 border-b text-center no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataIbuHamil as $index => $ibu)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b text-center">
                                {{ $index + 1 + ($dataIbuHamil->currentPage() - 1) * $dataIbuHamil->perPage() }}
                            </td>
                            <td class="px-6 py-4 border-b text-center">
                                {{ str_pad($ibu->id, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 border-b text-center">{{ $ibu->nama }}</td>
                            <td class="px-6 py-4 border-b text-center">
                                {{ \Carbon\Carbon::parse($ibu->created_at)->translatedFormat('l, d F Y') }}
                            </td>
                            <td class="px-6 py-4 border-b text-center no-print">
                                <a href="{{ route('data-ibu-hamil.show', ['nama' => $ibu->nama]) }}"
                                    class="text-blue-600 hover:underline">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('data-ibu-hamil.edit', $ibu->nama) }}"
                                    class="text-yellow-600 hover:underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <x-delete-button :route="route('data-ibu-hamil.destroy', $ibu->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
