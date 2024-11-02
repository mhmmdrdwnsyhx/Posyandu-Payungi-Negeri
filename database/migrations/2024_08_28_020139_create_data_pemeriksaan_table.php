<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPemeriksaanTable extends Migration
{
    public function up()
    {
        Schema::create('data_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ibu_hamil_id')->constrained('data_ibu_hamils')->onDelete('cascade');
            $table->date('tanggal_pemeriksaan');
            $table->float('berat_badan');
            $table->string('tensi');
            $table->integer('usia_kandungan');
            $table->text('gizi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_pemeriksaan');
    }
}