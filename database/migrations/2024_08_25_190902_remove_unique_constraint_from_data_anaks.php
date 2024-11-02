<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueConstraintFromDataAnaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_anaks', function (Blueprint $table) {
            $table->dropUnique(['no_kk']); // Menghapus constraint unik dari kolom no_kk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_anaks', function (Blueprint $table) {
            $table->unique('no_kk'); // Menambahkan kembali constraint unik jika diperlukan
        });
    }
}