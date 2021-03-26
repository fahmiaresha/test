<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranPenerimaanBahanBaku;
use Illuminate\Support\Carbon;
use App\Models\PenerimaanBahanBaku;
use DB;

class LaporanSupplierController extends Controller
{
    public function index()
    {
    	$date = Carbon::now()->startOfMonth();
    	$date_end = Carbon::now();
    	$jumlah_transaksi = PembayaranPenerimaanBahanBaku::join('penerimaan_bahan_baku as p','p.ID_PENERIMAAN','=','pembayaran_penerimaan_bahan_baku.ID_PENERIMAAN')->whereBetween(DB::raw('DATE(TGL_KEDATANGAN)'),[$date,$date_end])->count('KODE_PEMBAYARAN');
    	$pembayaran = PembayaranPenerimaanBahanBaku::join('penerimaan_bahan_baku as p','p.ID_PENERIMAAN','=','pembayaran_penerimaan_bahan_baku.ID_PENERIMAAN')->whereBetween(DB::raw('DATE(TGL_KEDATANGAN)'),[$date,$date_end])->sum('BIAYA_TRANSAKSI');
    	$penerimaan = PenerimaanBahanBaku::join('pembayaran_penerimaan_bahan_baku as p', 'p.ID_PENERIMAAN', '=', 'penerimaan_bahan_baku.ID_PENERIMAAN')->whereBetween(DB::raw('DATE(penerimaan_bahan_baku.TGL_KEDATANGAN)'),[$date,$date_end])->get();
    	return view('owner.transaksi-supplier')->with(compact('jumlah_transaksi','penerimaan', 'pembayaran'));
    }
}
