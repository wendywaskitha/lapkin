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
        Schema::create('detail_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nip');
            $table->foreignId('pangkat_id');
            $table->foreignId('jabatan_id');
            $table->foreignId('eselon_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pegawais');
    }
};
