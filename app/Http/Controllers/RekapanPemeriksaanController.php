<?php

namespace App\Http\Controllers;

use App\Models\DataPemeriksaan;
use App\Models\Pemeriksaan;
use App\Models\DataPemeriksaanPush; // Pastikan model ini ada
use App\Models\PemeriksaanPush;
use Illuminate\Http\Request;

class RekapanPemeriksaanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query parameter 'tanggal' untuk pencarian
        $tanggal = $request->input('tanggal');

        // Validasi format tanggal
        if ($tanggal && !\Carbon\Carbon::createFromFormat('Y-m-d', $tanggal)) {
            return redirect()->back()->withErrors(['tanggal' => 'Format tanggal tidak valid.']);
        }

        // Ambil data pemeriksaan, filter jika tanggal pencarian ada
        $pemeriksaans = Pemeriksaan::when($tanggal, function ($query) use ($tanggal) {
            return $query->whereDate('tanggal_periksa', $tanggal);
        })->get();

        // Ambil data pemeriksaan ibu hamil, filter jika tanggal pencarian ada
        $datapemeriksaansibuhamil = DataPemeriksaan::with('ibuHamil')
            ->when($tanggal, function ($query) use ($tanggal) {
                return $query->whereDate('tanggal_pemeriksaan', $tanggal);
            })
            ->get();

        // Ambil data pemeriksaan PUSH, filter jika tanggal pencarian ada
        $datapemeriksaanpush = PemeriksaanPush::when($tanggal, function ($query) use ($tanggal) {
            return $query->whereDate('tanggal_periksa', $tanggal);
        })->get();

        // Kembalikan view dengan hasil pencarian
        return view('rekapan-pemeriksaan.index', compact('pemeriksaans', 'datapemeriksaansibuhamil', 'datapemeriksaanpush', 'tanggal'));
    }
}
