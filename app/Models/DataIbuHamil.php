<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataIbuHamil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_suami',
        'mengandung_anak_ke',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the age of the ibu hamil based on the birth date.
     *
     * @return int
     */
    public function getUmurAttribute()
    {
        // Menghitung umur berdasarkan tanggal lahir
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    /**
     * Define a one-to-many relationship with DataPemeriksaan.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function dataPemeriksaan()
    {
        return $this->hasMany(DataPemeriksaan::class, 'ibu_hamil_id'); // Ganti 'ibu_hamil_id' dengan nama kolom foreign key yang sesuai
    }
}
