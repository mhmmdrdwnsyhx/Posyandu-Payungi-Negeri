@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Data Anak</h1>

    <!-- Menampilkan pesan sukses atau error -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Ada kesalahan!</strong>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('data-anak.update', $dataAnak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- <div class="mb-4">
            <label for="no_kk" class="block text-gray-700">No. KK</label>
            <input type="text" id="no_kk" name="no_kk"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('no_kk', $dataAnak->no_kk) }}">
        </div> -->

        <div class="mb-4">
            <label for="nik" class="block text-gray-700">NIK</label>
            <input type="text" id="nik" name="nik"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('nik', $dataAnak->nik) }}">
        </div>

        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('nama', $dataAnak->nama) }}">
        </div>

        <div class="mb-4">
            <label for="tempat_lahir" class="block text-gray-700">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('tempat_lahir', $dataAnak->tempat_lahir) }}">
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-gray-700">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('tanggal_lahir', $dataAnak->tanggal_lahir) }}">
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required>
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin', $dataAnak->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                    Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $dataAnak->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                    Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="umur" class="block text-gray-700">Umur</label>
            <input type="number" id="umur" name="umur"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('umur', $dataAnak->umur) }}">
        </div>

        <div class="mb-4">
            <label for="nama_ayah" class="block text-gray-700">Nama Ayah</label>
            <input type="text" id="nama_ayah" name="nama_ayah"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('nama_ayah', $dataAnak->nama_ayah) }}">
        </div>

        <div class="mb-4">
            <label for="nama_ibu" class="block text-gray-700">Nama Ibu</label>
            <input type="text" id="nama_ibu" name="nama_ibu"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required value="{{ old('nama_ibu', $dataAnak->nama_ibu) }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
@endsection
