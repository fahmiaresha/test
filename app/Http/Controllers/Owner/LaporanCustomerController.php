<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PembayaranPenjualan;
use Illuminate\Support\Carbon;

use DB;

class LaporanCustomerController extends Controller
{
    public function LaporanCustomer(){
        //tanggal pertama bulan ini
    	$date = Carbon::now()->startOfMonth();

	    //tanggal terakhir bulan ini
        $date_end = Carbon::now()->endOfMonth();

        $data_transaksi = [];

        $data_transaksi[0] = Penjualan::select('*')->whereBetween(DB::raw('DATE(TGL_PENJUALAN)'),[$date,$date_end])->get();

    	//total penjualan bulan ini
        $data_transaksi[1] = PembayaranPenjualan::whereBetween(DB::raw('DATE(TGL_PEMBAYARAN)'),[$date,$date_end])
                            ->join('penjualan as p', 'p.ID_PENJUALAN', '=', 'pembayaran_penjualan.ID_PENJUALAN')
                            ->where('p.STATUS_PENJUALAN', '=', 1)
                            ->count('KODE_PEMBAYARAN_PENJUALAN');

        return view('owner/transaksi-customer')->with(compact('data_transaksi'));
    }
}
