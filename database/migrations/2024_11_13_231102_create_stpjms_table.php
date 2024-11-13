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
        Schema::create('stpjms', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('user_id');
            $table->string('unitkerja_id');
            $table->string('tandatangan_id');
            $table->foreignId('unit_kerja_id');
            $table->foreignId('tanda_tangan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stpjms');
    }
};
