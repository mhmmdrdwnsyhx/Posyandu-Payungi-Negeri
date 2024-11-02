<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddIdPesertaToDataAnaksTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom id_peserta
        Schema::table('data_anaks', function (Blueprint $table) {
            $table->integer('id_peserta')->nullable()->unique()->after('id');
        });

        // Mengisi id_peserta yang ada dengan urutan berurutan
        $dataAnaks = DB::table('data_anaks')->orderBy('created_at')->get();
        
        foreach ($dataAnaks as $index => $dataAnak) {
            DB::table('data_anaks')
                ->where('id', $dataAnak->id)
                ->update(['id_peserta' => $index + 1]);
        }
    }

    public function down()
    {
        // Menghapus kolom id_peserta
        Schema::table('data_anaks', function (Blueprint $table) {
            $table->dropColumn('id_peserta');
        });
    }
}