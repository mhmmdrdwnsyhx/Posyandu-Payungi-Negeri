<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanPush;
use App\Models\DataPush;
use Illuminate\Http\Request;

class PemeriksaanPushController extends Controller
{
    // Menampilkan detail data push dan data pemeriksaan
    public function show($id)
    {
        $dataPush = DataPush::findOrFail($id);
        $pemeriksaanPush = PemeriksaanPush::where('data_push_id', $id)->get();

        return view('data-push.show', [
            'dataPush' => $dataPush,
            'pemeriksaanPush' => $pemeriksaanPush
        ]);
    }

    // Menampilkan form untuk membuat data pemeriksaan baru
    public function create($id)
{
    $dataPush = DataPush::findOrFail($id);

    return view('pemeriksaan-push.create', compact('dataPush'));
}


    // Menyimpan data pemeriksaan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_push_id' => 'required|exists:data_pushes,id',
            'tanggal_periksa' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tensi' => 'required|string',
            'jenis_kb' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        PemeriksaanPush::create($validated);

        return redirect()->route('data-push.show', $request->data_push_id)
                         ->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pemeriksaan
    public function edit($id)
{
    $pemeriksaanPush = PemeriksaanPush::findOrFail($id);

    return view('pemeriksaan-push.edit', compact('pemeriksaanPush'));
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

        $pemeriksaanPush = PemeriksaanPush::findOrFail($id);
        $pemeriksaanPush->update($validated);

        return redirect()->route('data-push.show', $pemeriksaanPush->data_push_id)
                         ->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    // Menghapus data pemeriksaan
    public function destroy($id)
    {
        $pemeriksaanPush = PemeriksaanPush::findOrFail($id);
        $dataPushId = $pemeriksaanPush->data_push_id;
        $pemeriksaanPush->delete();

        return redirect()->route('data-push.show', $dataPushId)
                         ->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}