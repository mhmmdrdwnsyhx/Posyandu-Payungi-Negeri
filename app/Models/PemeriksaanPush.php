<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PemeriksaanPush extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pemeriksaan_push';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'data_push_id',
        'tanggal_periksa',
        'berat_badan',
        'tensi',
        'jenis_kb',
        'catatan'
    ];

    // Jika Anda menggunakan hubungan Eloquent
    public function dataPush()
    {
        return $this->belongsTo(DataPush::class, 'data_push_id');
    }
     protected $casts = [
        'tanggal_periksa' => 'datetime',
    ];
}