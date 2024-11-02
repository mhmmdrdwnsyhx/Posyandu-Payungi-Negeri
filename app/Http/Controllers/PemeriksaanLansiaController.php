<?php

namespace App\Http\Controllers;
use App\Models\PemeriksaanLansia;
use App\Models\DataLansia;
use Illuminate\Http\Request;


class PemeriksaanLansiaController extends Controller
{
    //
    public function show($id)
    {
        $dataLansia = DataLansia::findOrFail($id);
        $pemeriksaanLansia = PemeriksaanLansia::where('data_lansia_id', $id)->get();

        return view('data-lansia.show', [
            'dataLansia' => $dataLansia,
            'pemeriksaanLansia' => $pemeriksaanLansia
        ]);
    }
    public function create($id)
    {
        $dataLansia = DataLansia::findOrFail($id);
    
        return view('pemeriksaan-lansia.create', compact('dataLansia'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_lansia_id' => 'required|exists:data_lansia,id',
            'tanggal_periksa' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tensi' => 'required|string',
            'jenis_kb' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        PemeriksaanLansia::create($validated);

        return redirect()->route('data-lansia.show', $request->data_lansia_id)
                         ->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
{
    $pemeriksaanLansia = PemeriksaanLansia::findOrFail($id);

    return view('pemeriksaan-lansia.edit', compact('pemeriksaanLansia'));
}
      // Mengupdate data pemeriksaan
      public function update(Request $request, $id)
      {
          $validated = $request->validate([
              'tanggal_periksa' => 'required|date',
              'berat_badan' => 'required|numeric',
              'tensi' => 'required|string',
              'jenis_kb' => 'required|string',
              'catatan' => 'nullable|string',
          ]);
  
          $pemeriksaanLansia = PemeriksaanLansia::findOrFail($id);
          $pemeriksaanLansia->update($validated);
  
          return redirect()->route('data-lansia.show', $pemeriksaanLansia->data_lansia_id)
                           ->with('success', 'Data pemeriksaan berhasil diperbarui.');
      }
      public function destroy($id)
    {
        $pemeriksaanLansia = PemeriksaanLansia::findOrFail($id);
        $dataLansiaId = $pemeriksaanLansia->data_lansia_id;
        $pemeriksaanLansia->delete();

        return redirect()->route('data-lansia.show', $dataLansiaId)
                         ->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}
