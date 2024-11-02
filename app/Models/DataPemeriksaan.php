<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemeriksaan extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari nama model yang di-pluralize secara otomatis
    protected $table = 'data_pemeriksaan';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'ibu_hamil_id',
        'tanggal_pemeriksaan',
        'berat_badan',
        'tensi',
        'ukuran_lila',          //tambahan ukuran_lila
        'usia_kandungan',
        'gizi',
        'catatan',
    ];

    // Relasi dengan DataIbuHamil
    public function ibuHamil()
    {
        return $this->belongsTo(DataIbuHamil::class, 'ibu_hamil_id');
    }
    // app/Models/DataPemeriksaan.php

    public function dataIbuHamil()
    {
        return $this->belongsTo(DataIbuHamil::class, 'ibu_hamil_id'); // Ganti 'ibu_hamil_id' dengan nama kolom foreign key yang sesuai
    }

    
}