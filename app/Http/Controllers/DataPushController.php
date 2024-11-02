<?php

namespace App\Http\Controllers;

use App\Models\DataPush;
use App\Models\PemeriksaanPush;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataPushController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai dari input search jika ada
        $search = $request->input('search');

        // Query dasar untuk data push
        $query = DataPush::query();

        // Filter berdasarkan Nama Suami atau Nama Istri jika ada input search
        if ($search) {
            $query->where('nama_suami', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama_istri', 'LIKE', '%' . $search . '%');
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        // Dapatkan hasil query dengan paginasi
        $dataPush = $query->paginate(10);

        // Kirim hasil ke view
        return view('data-push.index', compact('dataPush'));
    }

    public function create()
    {
        return view('data-push.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'string|max:255',
            'nik_suami' => 'required|string|max:255',
            'nama_suami' => 'required|string|max:255',
            'tempat_lahir_suami' => 'required|string|max:255',
            'tanggal_lahir_suami' => 'required|date',
            'nik_istri' => 'required|string|max:255',
            'nama_istri' => 'required|string|max:255',
            'tempat_lahir_istri' => 'required|string|max:255',
            'tanggal_lahir_istri' => 'required|date',
            'jumlah_anak' => 'required|integer',
            'jenis_kb' => 'required|string', // Ganti pemasang_kb menjadi jenis_kb
        ]);

        // Generate ID Peserta
        $lastEntry = DataPush::orderBy('id', 'desc')->first();
        $lastNumber = $lastEntry ? intval(substr($lastEntry->id_peserta, 2)) : 0;
        $newNumber = $lastNumber + 1;
        $newIdPeserta = 'DP' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // Create new DataPush with generated id_peserta
        DataPush::create(array_merge($request->all(), ['id_peserta' => $newIdPeserta]));

        return redirect()->route('data-push.index')
            ->with('success', 'Data PUS berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dataPush = DataPush::findOrFail($id);
        $pemeriksaanPush = PemeriksaanPush::where('data_push_id', $id)->get();

        return view('data-push.show', compact('dataPush', 'pemeriksaanPush'));
    }

    public function edit($id)
    {
        $dataPush = DataPush::findOrFail($id);
        return view('data-push.edit', compact('dataPush'));
    }

    public function update(Request $request, DataPush $dataPush)
    {
        // Validasi data dari request
        $request->validate([
            'no_kk' => [
                'string',
                'max:255',
                Rule::unique('data_pushes', 'no_kk')->ignore($dataPush->id),
            ],
            'nik_suami' => [
                'required',
                'string',
                'max:255',
                Rule::unique('data_pushes', 'nik_suami')->ignore($dataPush->id),
            ],
            'nama_suami' => 'required|string|max:255',
            'tempat_lahir_suami' => 'required|string|max:255',
            'tanggal_lahir_suami' => 'required|date',
            'umur_suami' => 'required|integer',
            'nik_istri' => [
                'required',
                'string',
                'max:255',
                Rule::unique('data_pushes', 'nik_istri')->ignore($dataPush->id),
            ],
            'nama_istri' => 'required|string|max:255',
            'tempat_lahir_istri' => 'required|string|max:255',
            'tanggal_lahir_istri' => 'required|date',
            'umur_istri' => 'required|integer',
            'jumlah_anak' => 'required|integer',
            'jenis_kb' => 'required|string', // Ganti pemasang_kb menjadi jenis_kb
        ]);

        // Melakukan update data berdasarkan input dari request
        $dataPush->update([
            'no_kk' => $request->no_kk,
            'nik_suami' => $request->nik_suami,
            'nama_suami' => $request->nama_suami,
            'tempat_lahir_suami' => $request->tempat_lahir_suami,
            'tanggal_lahir_suami' => $request->tanggal_lahir_suami,
            'umur_suami' => $request->umur_suami,
            'nik_istri' => $request->nik_istri,
            'nama_istri' => $request->nama_istri,
            'tempat_lahir_istri' => $request->tempat_lahir_istri,
            'tanggal_lahir_istri' => $request->tanggal_lahir_istri,
            'umur_istri' => $request->umur_istri,
            'jumlah_anak' => $request->jumlah_anak,
            'jenis_kb' => $request->jenis_kb, // Ganti pemasang_kb menjadi jenis_kb
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('data-push.index')
            ->with('success', 'Data PUS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataPush = DataPush::findOrFail($id);
        $dataPush->delete();

        return redirect()->route('data-push.index')
            ->with('success', 'Data PUS berhasil dihapus.');
    }
}
