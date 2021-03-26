<?php

namespace App\Http\Controllers\AdminGudang;
use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\PembayaranPenjualan;
use App\Models\AdminGudang;
use App\Models\JenisProduct;
use App\Models\Product;
use App\Models\Penjualan;

class PengirimanBarangController extends Controller
{

    public function index()
    {
        $data_pengiriman = Pengiriman::all();
        $data_penjualan = Penjualan::select('penjualan.*','p.*','pp.*')->join('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')->where('pp.STATUS_PEMBAYARAN','=',1)->get();
        return view('/admin-gudang/pengiriman-barang')->with(compact("data_pengiriman","data_penjualan"));
    }

    public function insert(){
    	$cust = PembayaranPenjualan::leftjoin('pengiriman as p','pembayaran_penjualan.KODE_PEMBAYARAN_PENJUALAN','=','p.KODE_PEMBAYARAN_PENJUALAN')
    	->where('STATUS_PEMBAYARAN','=',1)
    	->whereNull('p.KODE_PENGIRIMAN')
    	->get();
    	$admin = AdminGudang::find(1);
    	$kategori = JenisProduct::all();
    	$produk = Product::all();

    	return view('/admin-gudang/input-pengiriman-barang')->with(compact("cust","admin","kategori","produk"));
    }

    public function store(Request $request){
        $request->validate([
            'ID_ADMIN_GUDANG' => 'required|exists:App\Models\AdminGudang,ID_ADMIN_GUDANG|integer',
            'TGL_KIRIM' => 'required|date_format:Y-m-d',
            'KODE_PEMBAYARAN_PENJUALAN' => 'required|exists:App\Models\PembayaranPenjualan,KODE_PEMBAYARAN_PENJUALAN|integer',
            'TIPE_KENDARAAN' => 'required|string|max:75',
            'NOPOL' => 'required|string|max:13'
        ]);
        Pengiriman::insert([
            'KODE_PEMBAYARAN_PENJUALAN' => $request->KODE_PEMBAYARAN_PENJUALAN,
            'ID_ADMIN_GUDANG' => $request->ID_ADMIN_GUDANG,
            'TGL_KIRIM_RIIL' => date('Y-m-d',strtotime($request->TGL_KIRIM)),
            'TIPE_KENDARAAN' => $request->TIPE_KENDARAAN,
            'NOPOL' => $request->NOPOL,
        ]);
        return redirect('/admin-gudang/order-barang');
    }

}
