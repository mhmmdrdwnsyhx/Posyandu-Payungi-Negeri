<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJenisKelaminColumnInDataAnaksTable extends Migration
{
    public function up()
    {
        Schema::table('data_anaks', function (Blueprint $table) {
            $table->string('jenis_kelamin')->change(); // Mengubah tipe kolom menjadi string
        });
    }

    public function down()
    {
        Schema::table('data_anaks', function (Blueprint $table) {
            // Kembalikan ke tipe kolom sebelumnya jika perlu
            $table->enum('jenis_kelamin', ['L', 'P'])->change();
        });
    }
}