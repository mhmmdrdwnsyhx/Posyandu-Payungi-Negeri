@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Detail Data Lansia</h1>

    <div class="mb-4">
        <a href="{{ route('data-lansia.index') }}" 
           class="inline-block bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">
            Kembali ke Daftar
        </a>
        <x-cetak></x-cetak>
    </div>

    <div class="bg-white border border-gray-300 rounded shadow-sm p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $details = [
                    'NIK' => $dataLansia->nik,
                    'Nama' => $dataLansia->nama,
                    'Tempat Lahir' => $dataLansia->tempat_lahir,
                    'Tanggal Lahir' => \Carbon\Carbon::parse($dataLansia->tanggal_lahir)->format('d-m-Y'),
                    'Umur' => \Carbon\Carbon::parse($dataLansia->tanggal_lahir)->age . ' tahun',
                    'Jenis Kelamin' => $dataLansia->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
                    'Alamat' => $dataLansia->riwayat_penyakit ?? 'Tidak ada'
                ];
            @endphp

            @foreach ($details as $label => $value)
                <div>
                    <h2 class="text-xl font-semibold mb-2">{{ $label }}:</h2>
                    <p class="text-gray-700">{{ $value }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
