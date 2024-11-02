<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\DataAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemeriksaanController extends Controller
{
    /**
     * Menampilkan daftar pemeriksaan dengan paginasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data pemeriksaan dengan pagination
        $pemeriksaans = Pemeriksaan::paginate(5); // 5 item per halaman
        
        return view('pemeriksaan.index', compact('pemeriksaans'));
    }

    /**
     * Menampilkan form untuk menambahkan pemeriksaan baru.
     *
     * @param string $nama Nama data anak
     * @return \Illuminate\View\View
     */
    public function create($nama)
    {
        // Cari data anak berdasarkan nama
        $dataAnak = DataAnak::where('nama', $nama)->firstOrFail();

        // Tampilkan form tambah pemeriksaan dengan data anak yang relevan
        return view('pemeriksaan.create', compact('dataAnak'));
    }

    /**
     * Menyimpan pemeriksaan baru ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'data_anak_id' => 'required|exists:data_anak,id',  // Perbaiki validasi dengan nama tabel yang benar
            'tanggal_periksa' => 'required|date',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'gizi' => 'required|string|max:255',
            'imunisasi' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Menyimpan data pemeriksaan
        Pemeriksaan::create($request->all());

        // Mengambil nama anak berdasarkan ID
        $dataAnak = DataAnak::find($request->data_anak_id);
        $namaAnak = $dataAnak->nama;

        // Arahkan ke halaman detail data anak
        return redirect()->route('data-anak.show', ['nama' => $namaAnak])
                         ->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pemeriksaan berdasarkan ID.
     *
     * @param int $id ID pemeriksaan
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        return view('pemeriksaan.show', compact('pemeriksaan'));
    }

    /**
     * Menampilkan form untuk mengedit pemeriksaan.
     *
     * @param string $nama Nama anak
     * @return \Illuminate\View\View
     */
    public function edit($nama)
    {
        // Cari data anak berdasarkan nama
        $dataAnak = DataAnak::where('nama', $nama)->firstOrFail();

        // Ambil data pemeriksaan terkait yang ingin diedit
        $pemeriksaan = Pemeriksaan::where('data_anak_id', $dataAnak->id)->firstOrFail();

        // Tampilkan form edit pemeriksaan
        return view('pemeriksaan.edit', compact('dataAnak', 'pemeriksaan'));
    }

    /**
     * Memperbarui data pemeriksaan di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $nama Nama anak
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $nama)
    {
        // Validasi data
        $request->validate([
            'tanggal_periksa' => 'required|date',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'gizi' => 'required|string|max:255',
            'imunisasi' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Cari data anak berdasarkan nama
        $dataAnak = DataAnak::where('nama', $nama)->firstOrFail();

        // Ambil data pemeriksaan yang ingin diperbarui
        $pemeriksaan = Pemeriksaan::where('data_anak_id', $dataAnak->id)->firstOrFail();

        // Memperbarui data pemeriksaan
        $pemeriksaan->update($request->only([
            'tanggal_periksa',
            'berat_badan',
            'tinggi_badan',
            'gizi',
            'imunisasi',
            'catatan',
        ]));

        // Arahkan kembali ke halaman detail data anak
        return redirect()->route('data-anak.show', ['nama' => $dataAnak->nama])
                         ->with('success', 'Pemeriksaan berhasil diperbarui.');
    }

    /**
     * Menghapus data pemeriksaan dari database.
     *
     * @param int $id ID pemeriksaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari pemeriksaan berdasarkan ID
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // Hapus pemeriksaan
        $pemeriksaan->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}
