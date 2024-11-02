<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanLansiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('pemeriksaan_lansia', function (Blueprint $table) {
            $table->id();

            // Pilih satu saja sesuai dengan tipe data di tabel data_lansia
            // Jika id di data_lansia adalah string (UUID)
            $table->string('data_lansia_id'); // Tipe data harus sama dengan di tabel data_lansia

            // Jika id di data_lansia adalah bigint
            // $table->foreignId('data_lansia_id')->constrained('data_lansia')->onDelete('cascade');

            // Menambahkan foreign key
            $table->foreign('data_lansia_id')->references('id')->on('data_lansia')->onDelete('cascade');
            
            $table->date('tanggal_periksa');
            $table->decimal('berat_badan', 5, 2);
            $table->string('tensi');
            $table->string('jenis_kb');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_lansia');
    }
};
