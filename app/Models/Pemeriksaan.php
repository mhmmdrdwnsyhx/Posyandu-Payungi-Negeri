<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data_anak_id',
        'ibu_hamil_id', // Tambahkan jika perlu untuk menyimpan ID pemeriksaan ibu hamil
        'tanggal_periksa',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'gizi',
        'imunisasi',
        'catatan',
    ];

    /**
     * Define a relationship to the DataAnak model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataAnak()
    {
        // Pemeriksaan berelasi dengan DataAnak
        return $this->belongsTo(DataAnak::class, 'data_anak_id', 'id'); // pastikan foreign key dan local key yang benar
    }

    /**
     * Define a relationship to the DataIbuHamil model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataIbuHamil()
    {
        // Pemeriksaan berelasi dengan DataIbuHamil
        return $this->belongsTo(DataIbuHamil::class, 'ibu_hamil_id', 'id'); // pastikan foreign key dan local key yang benar
    }

    /**
     * (Optional) Jika Anda ingin menambahkan relasi untuk anak
     * Jika 'anak_id' bukan kolom di tabel ini, Anda bisa menghapus metode ini.
     */
    public function anak()
    {
        return $this->belongsTo(DataAnak::class, 'data_anak_id', 'id'); // Sesuaikan jika ada foreign key yang berbeda
    }
}
