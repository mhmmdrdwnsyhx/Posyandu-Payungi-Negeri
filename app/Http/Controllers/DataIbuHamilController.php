<?php

namespace App\Http\Controllers;

use App\Models\DataIbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DataIbuHamilController extends Controller
{
    // Menampilkan daftar data ibu hamil
    public function index(Request $request)
{
    // Ambil nilai dari input search jika ada
    $search = $request->input('search');

    // Query dasar untuk data ibu hamil
    $query = DataIbuHamil::query();

    // Filter berdasarkan ID Peserta atau Nama jika ada input search
    if ($search) {
        $query->where('id', 'LIKE', '%' . $search . '%')
              ->orWhere('nama', 'LIKE', '%' . $search . '%');
    }
     if ($request->filled('created_at')) {
        $query->whereDate('created_at', $request->created_at);
    }
    // Dapatkan hasil query dengan paginasi
    $dataIbuHamil = $query->paginate(10);

    // Kirim hasil ke view
    return view('data-ibu-hamil.index', compact('dataIbuHamil'));
}


    // Menampilkan form untuk menambah data ibu hamil
    public function create()
    {
        return view('data-ibu-hamil.create');
    }

    // Menyimpan data ibu hamil yang baru
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'string|max:255',
            'nik' => 'required|string|max:255|unique:data_ibu_hamils',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            // 'nama_suami' => 'required|string|max:255',
            'mengandung_anak_ke' => 'required|integer|min:1',
        ]);

        DataIbuHamil::create($request->all());

        return redirect()->route('data-ibu-hamil.index')
                         ->with('success', 'Data ibu hamil berhasil ditambahkan.');
    }

    // Menampilkan detail data ibu hamil
    public function show($nama)
{
    $ibuHamil = DataIbuHamil::where('nama', $nama)->firstOrFail();
    return view('data-ibu-hamil.show', compact('ibuHamil'));
}



    // Menampilkan form untuk mengedit data ibu hamil
public function edit($nama)
{
    $dataIbuHamil = DataIbuHamil::where('nama', $nama)->firstOrFail();
    return view('data-ibu-hamil.edit', compact('dataIbuHamil'));
}



    // Memperbarui data ibu hamil
    public function update(Request $request, $id)
{
    $request->validate([
        'no_kk' => '',
        'nik' => 'required',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'umur' => 'required|numeric',
        // 'nama_suami' => 'required',
        'mengandung_anak_ke' => 'required|numeric',
    ]);

    $dataIbuHamil = DataIbuHamil::findOrFail($id);
    $dataIbuHamil->update($request->all());

    return redirect()->route('data-ibu-hamil.index')->with('success', 'Data Ibu Hamil berhasil diperbarui');
}

    // Menghapus data ibu hamil
    public function destroy($id)
    {
        $ibu = DataIbuHamil::findOrFail($id);
        $ibu->delete();

        return redirect()->route('data-ibu-hamil.index')
                         ->with('success', 'Data ibu hamil berhasil dihapus.');
    }
}