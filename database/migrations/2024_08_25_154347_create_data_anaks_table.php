<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAnaksTable extends Migration
{
    public function up()
    {
        Schema::create('data_anaks', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('no_kk')->unique(); // Nomor Kartu Keluarga
            $table->string('nik')->unique(); // Nomor Induk Kependudukan
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']); // Enum untuk Jenis Kelamin
            $table->integer('umur');
            $table->string('nama_ayah');
            $table->string('nama_ibu');

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_anaks');
    }
}