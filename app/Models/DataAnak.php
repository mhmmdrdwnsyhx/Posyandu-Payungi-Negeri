<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnak extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'data_anaks'; 

    // Kolom-kolom yang bisa diisi massal
    protected $fillable = [
        'id_peserta',
        'no_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'umur',
        'nama_ayah',
        'nama_ibu',
    ];

    // Mengatur timestamp
    public $timestamps = true;

    // Menentukan primary key jika bukan 'id'
    protected $primaryKey = 'id';

    // Menentukan apakah primary key auto-increment
    public $incrementing = true;

    // Menentukan tipe primary key jika bukan integer
    protected $keyType = 'int';

    // Jika Anda ingin menggunakan format tanggal yang berbeda
    protected $dates = [
        'tanggal_lahir',
    ];

    // Manipulasi pada ID peserta
    public function setIdPesertaAttribute($value)
    {
        $this->attributes['id_peserta'] = str_pad($value, 3, '0', STR_PAD_LEFT);
    }

    // Memformat ID peserta ketika diambil dari database
    public function getIdPesertaAttribute($value)
    {
        return str_pad($value, 3, '0', STR_PAD_LEFT);
    }

    // Relasi dengan model Pemeriksaan
    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class, 'data_anak_id', 'id'); // pastikan 'data_anak_id' adalah kolom foreign key yang benar
    }
}
