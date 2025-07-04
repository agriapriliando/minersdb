<?php

namespace Database\Seeders;

use App\Models\RkabopPeralatan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RkabopPeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/all.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            RkabopPeralatan::create([
                'rkabop_id'                          => $item['profile_id'],
                'rkab_peralatan_pilih_tahun'         => $item['rkab_peralatan_pilih_tahun'],
                'rkab_peralatan_jenis'               => $item['rkab_peralatan_jenis'],
                'rkab_peralatan_merk'                => $item['rkab_peralatan_merk'] ?? null,
                'rkab_peralatan_jumlah'              => $item['rkab_peralatan_jumlah'] ?? null,
                'rkab_peralatan_no_plat'             => $item['rkab_peralatan_no_plat'] ?? null,
                'rkab_peralatan_status_milik_sendiri' => $item['rkab_peralatan_status_milik_sendiri'] ?? false,
                'rkab_peralatan_status_sewa'         => $item['rkab_peralatan_status_sewa'] ?? false,
                'rkab_peralatan_bbm_asal_kalteng'    => $item['rkab_peralatan_bbm_asal_kalteng'] ?? false,
                'rkab_peralatan_bbm_non_kalteng'     => $item['rkab_peralatan_bbm_non_kalteng'] ?? false,
                'rkab_peralatan_rencana_pakai_bbm'   => $item['rkab_peralatan_rencana_pakai_bbm'] ?? null,
            ]);
        }
    }
}
