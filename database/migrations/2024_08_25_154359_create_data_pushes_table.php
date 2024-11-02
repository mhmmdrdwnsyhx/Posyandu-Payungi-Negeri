<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPushesTable extends Migration
{
    public function up()
    {
        Schema::create('data_pushes', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta')->unique();
            $table->string('no_kk'); // Menyimpan nomor KK
            $table->string('nik_suami'); // Menyimpan NIK suami
            $table->string('nama_suami'); // Menyimpan nama suami
            $table->string('tempat_lahir_suami'); // Menyimpan tempat lahir suami
            $table->date('tanggal_lahir_suami'); // Menyimpan tanggal lahir suami
            $table->integer('umur_suami'); // Menyimpan umur suami
            $table->string('nik_istri'); // Menyimpan NIK istri
            $table->string('nama_istri'); // Menyimpan nama istri
            $table->string('tempat_lahir_istri'); // Menyimpan tempat lahir istri
            $table->date('tanggal_lahir_istri'); // Menyimpan tanggal lahir istri
            $table->integer('umur_istri'); // Menyimpan umur istri
            $table->integer('jumlah_anak'); // Menyimpan jumlah anak
            $table->enum('pemasang_kb', ['Suami', 'Istri']); // Menyimpan informasi pemasang KB (Suami atau Istri)
            $table->timestamps(); // Menyimpan timestamp created_at dan updated_at secara otomatis
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_pushes');
    }
}