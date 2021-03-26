<?php

use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $jabatans = ['Owner','Admin Gudang','Manajer Marketing','Sales A', 'Sales B', 'Operator Mesin'];

    	foreach($jabatans as $j){
    		DB::table('jabatan')->insert([
	            'nama_jabatan' => $j
            ]);
        } 
    }
}