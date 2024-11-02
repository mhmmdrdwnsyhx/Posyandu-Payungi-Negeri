<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class DataAnakController extends Controller
{
    // Menampilkan daftar Data Anak
    public function index(Request $request)
{
    // Query dasar
    $query = DataAnak::query();

    // Filter berdasarkan kata kunci pencarian
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('id_peserta', 'like', '%' . $request->search . '%')
              ->orWhere('nama', 'like', '%' . $request->search . '%')
              ->orWhere('jenis_kelamin', 'like', '%' . $request->search . '%');
        });
    }

    // Filter berdasarkan tanggal
    if ($request->filled('created_at')) {
        $query->whereDate('created_at', $request->created_at);
    }

    // Dapatkan data anak berdasarkan filter
    $dataAnak = $query->paginate(10);

    return view('data-anak.index', compact('dataAnak'));
}



    
    // Menampilkan form untuk menambahkan Data Anak baru
    public function create()
    {
        return view('data-anak.create');
    }

    // Menyimpan Data Anak baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'no_kk' => 'string|max:255',
            'nik' => 'required|string|max:255|unique:data_anaks,nik',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
            'umur' => 'required|integer',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        // Cek apakah nama sudah ada di database
        $namaExist = DataAnak::where('nama', $request->input('nama'))->exists();
        if ($namaExist) {
            // Jika nama sudah ada, redirect kembali ke form dengan pesan error
            return redirect()->back()->withErrors(['nama' => 'Nama sudah ada dalam database.'])->withInput();
        }

        // Generate id_peserta otomatis
        $lastId = DataAnak::max('id');
        $nextId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        // Menyimpan data anak
        DataAnak::create(array_merge(
            $request->all(),
            ['id_peserta' => $nextId]
        ));

        return redirect()->route('data-anak.index')
            ->with('success', 'Data Anak berhasil ditambahkan.');
    }

    // Menampilkan detail Data Anak berdasarkan nama
    public function show($nama)
    {
        // Cari data anak berdasarkan nama
        $dataAnak = DataAnak::where('nama', $nama)->firstOrFail();

        // Ambil semua data pemeriksaan yang terkait dengan anak tersebut
        $pemeriksaans = $dataAnak->pemeriksaans; // Menggunakan relasi yang sudah didefinisikan

        // Tampilkan halaman detail
        return view('data-anak.show', compact('dataAnak', 'pemeriksaans'));
    }

    // Menampilkan form untuk mengedit Data Anak
    public function edit($nama)
    {
        $dataAnak = DataAnak::where('nama', $nama)->firstOrFail();

        return view('data-anak.edit', compact('dataAnak'));
    }

    // Memperbarui Data Anak di database
    public function update(Request $request, DataAnak $dataAnak)
    {
        // Validasi data
        $request->validate([
            'no_kk' => [
                'string',
                'max:255',
                Rule::unique('data_anaks', 'no_kk')->ignore($dataAnak->id),
            ],
            'nik' => [
                'required',
                'string',
                'max:255',
                Rule::unique('data_anaks', 'nik')->ignore($dataAnak->id),
            ],
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
            'umur' => 'required|integer',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        // Memperbarui data anak
        $dataAnak->update($request->only([
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'umur',
            'nama_ayah',
            'nama_ibu'
        ]));

        return redirect()->route('data-anak.index')
            ->with('success', 'Data Anak berhasil diperbarui.');
    }

    // Menghapus Data Anak dari database
    public function destroy(DataAnak $dataAnak)
    {
        $dataAnak->delete();

        // Menyimpan pesan ke session flash
        Session::flash('status', 'Data sudah terhapus.');

        return redirect()->route('data-anak.index');
    }
}