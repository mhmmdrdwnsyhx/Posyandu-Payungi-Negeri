<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLansia extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'data_lansia';

    // Menentukan primary key tabel
    protected $primaryKey = 'id';

    // Menentukan tipe data primary key, karena default-nya adalah string (UUID)
    protected $keyType = 'string';

    // Mengatur auto-increment menjadi false, karena primary key bukan auto-increment
    public $incrementing = false;

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'id',
        'no_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'riwayat_penyakit',
        'auto_increment_id',
    ];

    // Mengatur kolom tanggal yang harus diperlakukan sebagai instance Carbon
    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
    ];

    // Fungsi boot untuk membuat UUID otomatis ketika membuat data baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid(); // Menghasilkan UUID untuk kolom id jika belum ada
            }
        });
    }

    // Relasi hasMany ke model PemeriksaanLansia
    public function pemeriksaanLansia()
    {
        return $this->hasMany(PemeriksaanLansia::class, 'data_lansia_id');
    }
    
}
