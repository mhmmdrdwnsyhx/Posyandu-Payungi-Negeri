<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataIbuHamilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk'); // Nomor Kartu Keluarga (KK)
            $table->string('nik')->unique(); // Nomor Induk Kependudukan (NIK)
            $table->string('nama'); // Nama ibu hamil
            $table->string('tempat_lahir'); // Tempat lahir
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->string('nama_suami'); // Nama suami
            $table->integer('mengandung_anak_ke'); // Mengandung anak ke-
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_ibu_hamils');
    }
}
