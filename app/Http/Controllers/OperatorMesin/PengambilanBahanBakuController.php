<?php

namespace App\Http\Controllers\OperatorMesin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BahanBaku;
use App\Models\PengambilanBahanBaku;
use App\Models\Mesin;
use App\Models\Supplier;
use App\Models\DetailPengambilan;
use App\Models\PenerimaanBahanBaku;
use App\Models\ProsesProduksi;
use App\Models\HasilProduct;

use DB;

class PengambilanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesin = Mesin::All();
        $bahan_baku = BahanBaku::all();
        
        $product = Product::select('kode_product', 'nama_product')->get();
        $data = PengambilanBahanBaku::all();
        
        return view('/operator-mesin/pengambilan-bahan-baku')->with(compact('data', 'product', 'mesin', 'bahan_baku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        // echo "masuk ke controller";

        $r->validate([
            'id_operator_mesin' => 'required|exists:App\Models\OperatorMesin,ID_OPERATOR_MESIN',
            'mesin' => 'required|exists:App\Models\Mesin,KODE_MESIN',
            'product' => 'required|exists:App\Models\Product,KODE_PRODUCT',
            'supplier' => 'required|array',
            'jumlah_bahan_baku' => 'required|array',
            'jumlah_karung_sak' => 'required|array'
        ]);

        DB::transaction(function() use ($r){

            $now = date("Y-m-d H:i:s");

            $nama_produk = Product::where(['KODE_PRODUCT' => $r->product])->value("NAMA_PRODUCT");

            // echo "<br> Nama Produk : ".$nama_produk;

            $id = PengambilanBahanBaku::insertGetId([
                'ID_OPERATOR_MESIN' => $r->id_operator_mesin,
                'KODE_MESIN' => $r->mesin,
                'WAKTU_PENGAMBILAN' => $now,
                'HASIL_PRODUK' => $nama_produk
            ]);

            $i = 0;

            foreach($r->bahan_baku as $key){

                $r->validate([
                    'supplier['.$i.']' => 'exists:App\Models\Supplier,ID_SUPPLIER|integer',
                    'bahan_baku['.$i.']' => 'exists:App\Models\BahanBaku,KODE_BAHAN_BAKU|integer',
                    'jumlah_bahan_baku['.$i.']' => 'integer',
                    'jumlah_karung_sak['.$i.']' => 'integer'
                ]);

                // echo "<br> Validated supplier[".$i."] : ".$r->supplier[$i];
                // echo "<br> Validated bahan_baku[".$i."] : ".$r->bahan_baku[$i];
                // echo "<br> Validated jumlah_bahan_baku[".$i."] : ".$r->jumlah_bahan_baku[$i];
                // echo "<br> Validated jumlah_karung_sak[".$i."] : ".$r->jumlah_karung_sak[$i];

                $idp = PenerimaanBahanBaku::where([
                    'KODE_BAHAN_BAKU' => $r->bahan_baku[$i],
                    'ID_SUPPLIER' => $r->supplier[$i],
                ])->value('ID_PENERIMAAN');

                // echo "<br> Id Penerimaan Bahan Baku : ".$idp;

                DetailPengambilan::insert([
                    'ID_PENERIMAAN' => $idp,
                    'KODE_PENGAMBILAN' => $id,
                    'JUMLAH_KG' => $r->jumlah_bahan_baku[$i],
                    'JUMLAH_SAK_KARUNG' => $r->jumlah_karung_sak[$i]
                ]);

                $i++;
            }

            // echo "<br> Id Pengambilan Bahan Baku : ".$id;

            ProsesProduksi::insert([
                'KODE_PENGAMBILAN_BAHAN_BAKU' => $id,
                'TGL_PRODUKSI' => $now
            ]);

            $kode_produksi = ProsesProduksi::where(['KODE_PENGAMBILAN_BAHAN_BAKU' => $id])->orderBy('TGL_PRODUKSI','DESC')->value('KODE_PRODUKSI');

            // echo "<br> Kode Produksi : ".$kode_produksi;

            HasilProduct::insert([
                'KODE_PRODUKSI' => $kode_produksi,
                'KODE_PRODUCT' => $r->product
            ]);

            // echo "<br> Berhasil diinputkan hasil product.";

        });

        return redirect('/operator-mesin/pengambilan-bahan-baku');
    }

    /**
     * Get bahan baku
     */
    public function getBahanBaku()
    {
        $bahan_baku = BahanBaku::select('KODE_BAHAN_BAKU', 'NAMA_BAHAN_BAKU')->get();
        
        return response()->json(['success' => true,'data' => $bahan_baku]);
    }

    /**
     * Get Supplier
     */
    public function getSupplier(Request $r)
    {
        $supplier = PenerimaanBahanBaku::select('penerimaan_bahan_baku.*', 's.NAMA_SUPPLIER')
                    ->leftJoin('supplier as s', 's.ID_SUPPLIER', '=', 'penerimaan_bahan_baku.ID_SUPPLIER')
                    ->where('penerimaan_bahan_baku.STOK_PENERIMAAN', '>', 0)
                    ->where('penerimaan_bahan_baku.KODE_BAHAN_BAKU', '=', $r->KODE_BAHAN_BAKU)
                    ->get();

        return response()->json(['success' => true,'data' => $supplier]);
    }

    /**
     * Get Stock
     */
    public function getStock(Request $r)
    {
        $stock = PenerimaanBahanBaku::select('JUMLAH_KARUNG_SAK', 'STOK_PENERIMAAN')
                    ->where('ID_SUPPLIER', '=', $r->ID_SUPPLIER)
                    ->get();

        return response()->json(['success' => true,'data' => $stock]);
    }

}
