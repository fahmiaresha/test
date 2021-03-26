<?php

use Illuminate\Database\Seeder;

class PengirimanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 1,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RIIL' => date("Y-m-d",strtotime("2020-08-28")),
            'TIPE_KENDARAAN' => 'Pick Up',
            'NOPOL' => 'W 2275 DV'
        ]);

        DB::table('pengiriman')->insert([
            'KODE_PEMBAYARAN_PENJUALAN' => 2,
            'ID_ADMIN_GUDANG' => rand(1,3),
            'TGL_KIRIM_RIIL' => date("Y-m-d",strtotime("2020-08-29")),
            'TIPE_KENDARAAN' => 'Pick Up',
            'NOPOL' => 'W 1414 XY'
        ]);
        
    }
}
