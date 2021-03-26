<?php

use Illuminate\Database\Seeder;

class BahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
    	DB::table('bahan_baku')->insert([
            'id_jenis_bahan_baku' => 1,
            'nama_bahan_baku' => 'Plastik Bekas',
            'stok_bahan_baku' => 0
        ]);  

        DB::table('bahan_baku')->insert([
            'id_jenis_bahan_baku' => 1,
            'nama_bahan_baku' => 'Plastik Virgin',
            'stok_bahan_baku' => 0
        ]);

        DB::table('bahan_baku')->insert([
            'id_jenis_bahan_baku' => 2,
            'nama_bahan_baku' => 'Pewarna',
            'stok_bahan_baku' => 0
        ]);
    }
}