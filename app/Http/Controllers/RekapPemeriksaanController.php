<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class RekapPemeriksaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemeriksaan::with('dataAnak');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $query->whereBetween('tanggal_periksa', [$start_date, $end_date]);
        }

        $pemeriksaans = $query->orderBy('tanggal_periksa', 'desc')->get();

        return view('data-anak.rekap-pemeriksaan', compact('pemeriksaans'));
    }
}