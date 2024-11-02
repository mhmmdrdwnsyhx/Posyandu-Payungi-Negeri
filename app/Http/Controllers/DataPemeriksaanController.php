<?php

namespace App\Http\Controllers;

use App\Models\DataPemeriksaan;
use App\Models\DataIbuHamil;
use Illuminate\Http\Request;

class DataPemeriksaanController extends Controller
{
    /**
     * Menampilkan daftar data pemeriksaan berdasarkan ibu_hamil_id.
     */
    public function index(Request $request)
    {
        $ibuHamilId = $request->query('ibu_hamil_id');
        $dataPemeriksaan = DataPemeriksaan::where('ibu_hamil_id', $ibuHamilId)->get();

        return view('data-pemeriksaan.index', compact('dataPemeriksaan'));
    }

    /**
     * Menampilkan form untuk membuat data pemeriksaan baru berdasarkan nama ibu hamil.
     */
    public function create($nama)
    {
        // Cari data ibu hamil berdasarkan nama
        $ibuHamil = DataIbuHamil::where('nama', $nama)->firstOrFail();

        return view('data-pemeriksaan.create', compact('ibuHamil'));
    }

    /**
     * Menyimpan data pemeriksaan yang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ibu_hamil_id' => 'required|exists:data_ibu_hamils,id',
            'tanggal_pemeriksaan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tensi' => 'required|string',
            'ukuran_lila' => 'string',                  //tambahan ukuran_lila
            'usia_kandungan' => 'required|string',
            'gizi' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataPemeriksaan = DataPemeriksaan::create([
            'ibu_hamil_id' => $request->ibu_hamil_id,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'berat_badan' => $request->berat_badan,
            'tensi' => $request->tensi,
            'ukuran_lila' => $request->ukuran_lila,     //tambahan ukuran_lila
            'usia_kandungan' => $request->usia_kandungan,
            'gizi' => $request->gizi,
            'catatan' => $request->catatan,
        ]);

        // Ambil data ibu_hamil berdasarkan ID setelah penyimpanan
        $ibuHamil = DataIbuHamil::findOrFail($request->ibu_hamil_id);

        return redirect()->route('data-ibu-hamil.show', ['nama' => $ibuHamil->nama])
                         ->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data pemeriksaan yang sudah ada.
     */
    public function edit(DataPemeriksaan $dataPemeriksaan)
    {
        // Pastikan ibu_hamil ter-load untuk akses nama di view
        $dataPemeriksaan->load('ibuHamil');

        return view('data-pemeriksaan.edit', compact('dataPemeriksaan'));
    }

    /**
     * Memperbarui data pemeriksaan yang sudah ada.
     */
    public function update(Request $request, DataPemeriksaan $dataPemeriksaan)
    {
        $request->validate([
            'tanggal_pemeriksaan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tensi' => 'required|string',
            'ukuran_lila' => 'string',                  //tambahan ukuran_lila
            'usia_kandungan' => 'required|string',
            'gizi' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataPemeriksaan->update([
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'berat_badan' => $request->berat_badan,
            'tensi' => $request->tensi,
            'ukuran_lila' => $request->ukuran_lila,     //tambahan ukuran_lila
            'usia_kandungan' => $request->usia_kandungan,
            'gizi' => $request->gizi,
            'catatan' => $request->catatan,
        ]);

        $dataPemeriksaan->load('ibuHamil'); // Pastikan ibu_hamil ter-load

        return redirect()->route('data-ibu-hamil.show', ['nama' => $dataPemeriksaan->ibuHamil->nama])
                         ->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    /**
     * Menghapus data pemeriksaan yang ada.
     */
    public function destroy(DataPemeriksaan $dataPemeriksaan)
    {
        $dataPemeriksaan->load('ibuHamil'); // Pastikan ibu_hamil ter-load
        $ibuHamil = $dataPemeriksaan->ibuHamil->nama;
        $dataPemeriksaan->delete();

        return redirect()->route('data-ibu-hamil.show', ['nama' => $ibuHamil])
                         ->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}
