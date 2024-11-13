<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('tanggal');
            $table->time('jam_awal');
            $table->time('jam_akhir');
            $table->text('uraian');
            $table->double('target');
            $table->double('realisasi');
            $table->double('capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kinerjas');
    }
};
