<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanPushTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_push', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_push_id')->constrained('data_pushes')->onDelete('cascade');
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaan_push');
    }
}