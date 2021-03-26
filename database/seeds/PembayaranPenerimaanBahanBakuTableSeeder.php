<?php

use Illuminate\Database\Seeder;

class PembayaranPenerimaanBahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
			'ID_PENERIMAAN' => 1,
			'ID_OWNER' => 1,
			'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-28")),
			'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
            'ID_PENERIMAAN' => 2,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-28")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
            'ID_PENERIMAAN' => 3,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-28")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
            'ID_PENERIMAAN' => 4,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
            'ID_PENERIMAAN' => 5,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
            'ID_PENERIMAAN' => 6,
            'ID_OWNER' => 1,
            'TGL_PEMBAYARAN' => date("Y-m-d",strtotime("2020-08-29")),
            'STATUS_PEMBAYARAN' => 1
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
			'ID_PENERIMAAN' => 7,
			'STATUS_PEMBAYARAN' => 0
        ]);

        DB::table('pembayaran_penerimaan_bahan_baku')->insert([
			'ID_PENERIMAAN' => 8,
			'STATUS_PEMBAYARAN' => 0
        ]);

    }
}