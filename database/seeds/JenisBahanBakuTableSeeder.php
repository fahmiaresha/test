<?php

use Illuminate\Database\Seeder;

class JenisBahanBakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $jenisBahanBaku = ['Plastik', 'Pewarna'];

    	foreach($jenisBahanBaku as $j){
    		DB::table('jenis_bahan_baku')->insert([
	            'nama_jenis_bahan_baku' => $j
            ]);
        }   
    }
}