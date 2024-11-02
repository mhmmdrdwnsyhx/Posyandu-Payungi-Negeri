<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanLansia extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pemeriksaan_lansia';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'data_lansia_id',
        'tanggal_periksa',
        'berat_badan',
        'tensi',
        'jenis_kb',
        'catatan'
    ];
    public function dataLansia()
    {
        return $this->belongsTo(DataLansia::class, 'data_lansia_id');
    }
     protected $casts = [
        'tanggal_periksa' => 'datetime',
    ];
}
