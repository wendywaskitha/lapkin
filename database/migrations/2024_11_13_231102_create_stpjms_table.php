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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('unitkerja_id')->constrained('unit_kerjas')->cascadeOnDelete();
            $table->foreignId('tandatangan_id')->constrained('tanda_tangans')->cascadeOnDelete();
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
