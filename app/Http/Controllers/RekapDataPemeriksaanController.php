<?php

namespace App\Http\Controllers;

use App\Models\DataIbuHamil; // Pastikan untuk menggunakan model yang tepat
use Illuminate\Http\Request;

class RekapDataPemeriksaanController extends Controller
{
    public function index()
    {
        // Ambil semua data ibu hamil beserta data pemeriksaannya
        $ibuHamilList = DataIbuHamil::with('dataPemeriksaan')->get(); 
        return view('rekap-data-pemeriksaan.index', compact('ibuHamilList'));
    }
}
