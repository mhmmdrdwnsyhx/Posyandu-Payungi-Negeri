<?php

namespace App\Http\Controllers;

use App\Models\DataLansia;
use Illuminate\Http\Request;

class DataLansiaController extends Controller
{
    public function index()
    {
        $dataLansia = DataLansia::paginate(10);

        // Format ID peserta menggunakan auto_increment_id
        foreach ($dataLansia as $lansia) {
            $lansia->formatted_id = sprintf('DL%03d', $lansia->auto_increment_id); // Gunakan auto_increment_id untuk formatting
        }

        return view('data-lansia.index', compact('dataLansia'));
    }

    public function create()
    {
        return view('data-lansia.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:L,P',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        // Buat data lansia baru
        DataLansia::create($validated);

        return redirect()->route('data-lansia.index')->with('success', 'Data lansia berhasil disimpan.');
    }

    public function show($id)
    {
        $dataLansia = DataLansia::findOrFail($id); // Ubah pencarian menjadi berdasarkan auto_increment_id

        return view('data-lansia.show', compact('dataLansia'));
    }

    public function edit($id)
    {
        $dataLansia = DataLansia::findOrFail($id); // Ubah pencarian menjadi berdasarkan auto_increment_id
        return view('data-lansia.edit', compact('dataLansia'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:L,P',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        $dataLansia = DataLansia::findOrFail($id);
        $dataLansia->update($validated);

        return redirect()->route('data-lansia.index')->with('success', 'Data lansia berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataLansia = DataLansia::findOrFail($id);
        $dataLansia->delete();
        return redirect()->route('data-lansia.index')->with('success', 'Data lansia berhasil dihapus.');
    }
}
