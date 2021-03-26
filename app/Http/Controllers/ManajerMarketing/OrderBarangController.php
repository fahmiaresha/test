<?php

namespace App\Http\Controllers\ManajerMarketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DepoAirMinum;
use App\Models\JenisProduct;
use App\Models\Product;
use App\Models\DetilPenjualan;
use App\Models\KonfirmasiPenjualan;

use DB;

class OrderBarangController extends Controller
{
    public function index()
    {
        $data = Penjualan::where('STATUS_PENJUALAN', 0)->select('penjualan.*','p.KODE_PENGIRIMAN','pp.KODE_PEMBAYARAN_PENJUALAN')
        ->leftjoin('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')
        ->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')
        ->get();
        $data2 = Penjualan::where('STATUS_PENJUALAN', 1)->select('penjualan.*','p.KODE_PENGIRIMAN','pp.KODE_PEMBAYARAN_PENJUALAN')
        ->leftjoin('pembayaran_penjualan as pp','penjualan.ID_PENJUALAN','=','pp.ID_PENJUALAN')
        ->leftJoin('pengiriman as p','p.KODE_PEMBAYARAN_PENJUALAN','=','pp.KODE_PEMBAYARAN_PENJUALAN')
        ->get();
    	return view('manajer-marketing.order-barang', compact('data', 'data2'));
    }

    public function insert()
    {
    	$customer = DepoAirMinum::all();
    	$jenis =  JenisProduct::all();
        $products = Product::all();
        
    	return view('manajer-marketing.input-order-barang')->with(compact("customer","jenis","products"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'KODE_DEPO' => 'required|exists:App\Models\DepoAirMinum,KODE_DEPO|integer',
            'ID_MANAJER_MARKETING' => 'required|exists:App\Models\ManajerMarketing,ID_MANAJER_MARKETING|integer',
            'METODE_KIRIM' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'ONGKOS_KIRIM' => 'nullable|integer',
            'TOTAL_PENJUALAN' => 'required|integer',
            'KODE_PRODUCT' => 'required|array|min:1',
            'JUMLAH_SAK' => 'required|array|min:1',
            'JUMLAH_PCS' => 'required|array|min:1',
            'HARGA_BARANG' => 'required|array|min:1',
        ]);

        DB::transaction(function() use ($request){
            $penjualan = Penjualan::insertGetId([
                'KODE_DEPO' => $request->KODE_DEPO,
                'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
                'TGL_PENJUALAN' => date("Y-m-d"),
                'TGL_KIRIM' => date("Y-m-d"),
                'METODE_KIRIM' => $request->METODE_KIRIM,
                'ONGKOS_KIRIM' => $request->ONGKOS_KIRIM,
                'TOTAL_PENJUALAN' => $request->TOTAL_PENJUALAN,
                'STATUS_PENJUALAN' => 1
            ]);

            $id = Penjualan::select("ID_PENJUALAN")->where([
                'KODE_DEPO' => $request->KODE_DEPO,
                'ID_MANAJER_MARKETING' => $request->ID_MANAJER_MARKETING,
                'TGL_PENJUALAN' => date("Y-m-d"),
                'TGL_KIRIM' => date("Y-m-d"),
                'METODE_KIRIM' => $request->METODE_KIRIM,
                'ONGKOS_KIRIM' => $request->ONGKOS_KIRIM,
                'TOTAL_PENJUALAN' => $request->TOTAL_PENJUALAN,
                'STATUS_PENJUALAN' => 1
            ])->first();

            $i = 0;

            foreach ($request->KODE_PRODUCT as $key) {
                $detil = DetilPenjualan::insert([
                    'ID_PENJUALAN' => $id->ID_PENJUALAN,
                    'KODE_PRODUCT' => $key,
                    'JUMLAH_SAK' => $request->JUMLAH_SAK[$i],
                    'JUMLAH_PCS' => $request->JUMLAH_PCS[$i],
                    'HARGA_BARANG' => $request->HARGA_BARANG[$i]
                ]);
                $i++;
            }
        });

        return redirect('/manajer-marketing/order-barang');
    }

    public function getProducts($jenis)
    {
        $product = JenisProduct::find($jenis)->products()->get();
        return response()->json(["success" => true, "data" => $product]);
    }

    public function getAllProduct()
    {
        $product = Product::all();
        return response()->json(["success" => true, "data" => $product]);
    }

    public function changeStatus(Request $request)
    {
    	$request->validate([
    		'ID_KONFIRMASI_PENJUALAN' => 'required|exists:App\Models\KonfirmasiPenjualan,ID_KONFIRMASI_PENJUALAN|integer'
    	]);

    	$konfirmasi = KonfirmasiPenjualan::find($request->ID_KONFIRMASI_PENJUALAN);
    	$konfirmasi->STATUS_KONFIRMASI_PENJUALAN = 1;
        $konfirmasi->save();
        
        
        $penjualan = Penjualan::find($request->ID_KONFIRMASI_PENJUALAN);
        $penjualan->STATUS_PENJUALAN = 1;
        $penjualan->save();

        return response()->json(["success" => true]);
    }
}
