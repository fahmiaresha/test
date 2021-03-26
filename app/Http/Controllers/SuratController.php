<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Penjualan;

class SuratController extends Controller
{
    public function nota_penjualan($id)
    {
        $data = Penjualan::find($id);
        $n = intval(date("m")); 
        $res = ''; 

        //array of roman numbers
        $romanNumber_Array = array( 
            'M'  => 1000,'CM' => 900,'D'  => 500,'CD' => 400,'C'  => 100,'XC' => 90, 
            'L'  => 50,'XL' => 40,'X'  => 10,'IX' => 9,'V'  => 5,'IV' => 4,'I'  => 1); 

        foreach ($romanNumber_Array as $roman => $number){ 
            //divide to get  matches
            $matches = intval($n / $number); 

            //assign the roman char * $matches
            $res .= str_repeat($roman, $matches); 

            //substract from the number
            $n = $n % $number; 
        }

        $no_surat = "J/".$data->pembayaran_penjualans->ID_PENJUALAN."/EP.05/".$res."/".date("Y");

        $nota_penjualan = PDF::loadView('surat/nota_penjualan', compact("data","no_surat"));
        return $nota_penjualan->stream();
    }

    public function surat_jalan($id)
    {
        $data = Penjualan::find($id);
        $n = intval(date("m")); 
        $res = ''; 

        //array of roman numbers
        $romanNumber_Array = array( 
            'M'  => 1000,'CM' => 900,'D'  => 500,'CD' => 400,'C'  => 100,'XC' => 90, 
            'L'  => 50,'XL' => 40,'X'  => 10,'IX' => 9,'V'  => 5,'IV' => 4,'I'  => 1); 

        foreach ($romanNumber_Array as $roman => $number){ 
            //divide to get  matches
            $matches = intval($n / $number); 

            //assign the roman char * $matches
            $res .= str_repeat($roman, $matches); 

            //substract from the number
            $n = $n % $number; 
        }

        $no_surat = "J/".$data->pembayaran_penjualans->pengirimen->KODE_PENGIRIMAN."/EP.05/".$res."/".date("Y");

        $surat_jalan = PDF::loadView('surat/surat_jalan',compact("data","no_surat"));
        return $surat_jalan->stream();
    }
}
