<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPush extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'data_pushes';

    // Disable timestamps jika tidak digunakan

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_peserta',
        'no_kk',
        'nik_suami',
        'nama_suami',
        'tempat_lahir_suami',
        'tanggal_lahir_suami',
        'umur_suami',
        'nik_istri',
        'nama_istri',
        'tempat_lahir_istri',
        'tanggal_lahir_istri',
        'umur_istri',
        'jumlah_anak',
        'jenis_kb',
    ];

    // Casting kolom tanggal untuk mempermudah manipulasi tanggal
    protected $casts = [
        'tanggal_lahir_suami' => 'date',
        'tanggal_lahir_istri' => 'date',
    ];

    // Relasi dengan PemeriksaanPush
    public function pemeriksaanPushes()
    {
        return $this->hasMany(PemeriksaanPush::class, 'data_push_id');
    }
}