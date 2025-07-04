<?php

namespace Database\Seeders;

use App\Models\Reportmonth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ReportmonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/all.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $insertData = [
                'profile_id'         => $item['profile_id'],
                'laporan_keterangan' => $item['laporan_keterangan'] ?? null,
            ];

            // Otomatis untuk bulan 1-12
            for ($i = 1; $i <= 12; $i++) {
                $insertData["laporan_{$i}_rencana_produksi_utama"]    = $item["laporan_{$i}_rencana_produksi_utama"] ?? null;
                $insertData["laporan_{$i}_rencana_produksi_sampingan"] = $item["laporan_{$i}_rencana_produksi_sampingan"] ?? null;
                $insertData["laporan_{$i}_realisasi_produksi_utama"]  = $item["laporan_{$i}_realisasi_produksi_utama"] ?? null;
                $insertData["laporan_{$i}_realisasi_produksi_sampingan"] = $item["laporan_{$i}_realisasi_produksi_sampingan"] ?? null;
                $insertData["laporan_{$i}_realisasi_penjualan_utama"] = $item["laporan_{$i}_realisasi_penjualan_utama"] ?? null;
                $insertData["laporan_{$i}_realisasi_penjualan_sampingan"] = $item["laporan_{$i}_realisasi_penjualan_sampingan"] ?? null;
            }

            Reportmonth::create($insertData);
        }
    }
}
