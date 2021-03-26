<?php

use Illuminate\Database\Seeder;

class PembayaranPenjualanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayaran_penjualan')->insert([
            'ID_PENJUALAN' => 1,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-28")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penjualan')->insert([
            'ID_PENJUALAN' => 2,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penjualan')->insert([
            'ID_PENJUALAN' => 3,
            'STATUS_PEMBAYARAN' => 0,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-30")),
            'STATUS_PEMBAYARAN' => 0
        ]);
    }
}