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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->string('tahun_laporan', 4)->unique();

            // Loop bulan 1–12
            for ($i = 1; $i <= 12; $i++) {
                $table->string("laporan_{$i}_rencana_produksi_utama")->nullable();
                $table->string("laporan_{$i}_rencana_produksi_sampingan")->nullable();
                $table->string("laporan_{$i}_realisasi_produksi_utama")->nullable();
                $table->string("laporan_{$i}_realisasi_produksi_sampingan")->nullable();
                $table->string("laporan_{$i}_realisasi_penjualan_utama")->nullable();
                $table->string("laporan_{$i}_realisasi_penjualan_sampingan")->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
