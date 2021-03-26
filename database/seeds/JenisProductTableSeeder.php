<?php

use Illuminate\Database\Seeder;

class JenisProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $jenisProduk = ['Tutup Galon ORI', 'Tutup Galon Pendek', 'Tutup Galon Panjang', 'Tutup Botol Kecap', 'Tutup Botol Shortneck', 'Tutup Botol Longneck', 'Tutup Botol Flip Top'];

    	foreach($jenisProduk as $j){
    		DB::table('jenis_product')->insert([
	            'nama_jenis_product' => $j
            ]);
        } 
    }
}