@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Data PUS</h1>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">

    <div class="mb-5">
        <x-add-button route="{{ route('data-push.create') }}"></x-add-button>
        <button onclick="window.print()" class="bg-green-500 text-white px-6 py-3 rounded ml-2">Rekap Data</button>
    </div>

    <!-- Form Pencarian -->
    <div class="flex items-center justify-between mb-6">
        <!-- Form Filter berdasarkan Tanggal -->
        <form action="{{ route('data-push.index') }}" method="GET" class="w-full max-w-sm mb-3">
            <div class="flex items-center">
                <input type="date" name="created_at" value="{{ request('created_at') }}"
                    class="border border-gray-300 px-4 py-2 rounded ml-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>

        <!-- Form Pencarian berdasarkan ID, Nama, dan Jenis Kelamin -->
        <form action="{{ route('data-push.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Cari berdasarkan ID Peserta, Nama, atau Jenis Kelamin"
                    value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
            </div>
        </form>
    </div>

    <div class="print-container">
        <div class="print-title">Posyandu Payungi Negeri</div>
        <div class="print-address">Jl. Melati Gg. Surya No. 69 Kelurahan Sukajadi, Kecamatan Sukajadi, Kota Pekanbaru, Riau</div>
        <div class="print-subtitle">Data PUS Posyandu Payungi Negeri</div>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-center">No</th>
                        <th class="px-4 py-2 border-b text-center">Id Peserta</th>
                        <th class="px-4 py-2 border-b text-center">Nama Suami</th>
                        <th class="px-4 py-2 border-b text-center">Nama Istri</th>
                        <th class="px-4 py-2 border-b text-center">Jumlah Anak</th>
                        <th class="px-4 py-2 border-b text-center">Jenis KB</th> <!-- Kolom Jenis KB -->
                        <th class="px-6 py-3 border-b text-center">Dibuat Tanggal</th>
                        <th class="px-4 py-2 border-b text-center no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPush as $index => $push)
                        <tr>
                            <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td> <!-- Kolom No -->
                            <td class="px-4 py-2 border-b text-center">{{ $push->id_peserta }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $push->nama_suami }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $push->nama_istri }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $push->jumlah_anak }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $push->jenis_kb }}</td> <!-- Kolom Jenis KB -->
                            <td class="px-6 py-4 border-b text-center">
                                {{ \Carbon\Carbon::parse($push->created_at)->translatedFormat('l, d F Y') }}
                            </td>
                            <td class="px-4 py-2 border-b text-center no-print">
                                <a href="{{ route('data-push.show', $push->id) }}" class="text-blue-500 hover:underline">
                                    <i class="fas fa-eye"></i></a>
                                <a href="{{ route('data-push.edit', $push->id) }}"
                                    class="text-yellow-500 hover:underline ml-2"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('data-push.destroy', $push->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <x-delete-button class="text-red-500 hover:underline ml-2" :route="route('data-push.destroy', $push->id)" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $dataPush->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
