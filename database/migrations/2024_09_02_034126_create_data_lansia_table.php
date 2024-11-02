<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLansiaTable extends Migration
{
    public function up()
    {
        // Migration untuk tabel data_lansia
        Schema::create('data_lansia', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('no_kk')->nullable(); // Menambahkan nullable jika diperlukan
            $table->string('nik')->unique(); // Mengatur NIK sebagai unik
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('umur'); // Kolom umur harus ditambahkan
            $table->enum('jenis_kelamin', ['L', 'P']); // Jenis kelamin dengan enum
            $table->text('riwayat_penyakit')->nullable(); // Riwayat penyakit bersifat opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_lansia');
    }
}
