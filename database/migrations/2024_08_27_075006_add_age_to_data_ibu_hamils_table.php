<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeToDataIbuHamilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_ibu_hamils', function (Blueprint $table) {
            $table->integer('umur')->nullable()->after('mengandung_anak_ke'); // Menambahkan kolom umur
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_ibu_hamils', function (Blueprint $table) {
            $table->dropColumn('umur'); // Menghapus kolom umur
        });
    }
}
