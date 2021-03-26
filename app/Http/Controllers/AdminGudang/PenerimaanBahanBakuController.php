<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenerimaanBahanBaku;
use App\Models\Supplier;
use App\Models\BahanBaku;

class PenerimaanBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::select('id_supplier', 'nama_supplier')->get();
        $bahanBaku = BahanBaku::select('kode_bahan_baku', 'nama_bahan_baku')->get();
        $data = PenerimaanBahanBaku::select('penerimaan_bahan_baku.*', 'supplier.nama_supplier AS SUPPLIER', 'ag.nama_admin_gudang as STAFF_GUDANG', 'bk.nama_bahan_baku')
                ->join('supplier', 'supplier.id_supplier', '=', 'penerimaan_bahan_baku.id_supplier')
                ->join('admin_gudang as ag', 'ag.id_admin_gudang', '=', 'penerimaan_bahan_baku.id_admin_gudang')
                ->join('bahan_baku as bk', 'bk.kode_bahan_baku', '=', 'penerimaan_bahan_baku.kode_bahan_baku')->get();
        return view('/admin-gudang/penerimaan-bahan-baku')->with(compact('data', 'supplier', 'bahanBaku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required|exists:App\Models\Supplier,ID_SUPPLIER|integer',
            'kode_bahan_baku' => 'required|exists:App\Models\BahanBaku,KODE_BAHAN_BAKU|integer',
            'id_admin_gudang' => 'required|exists:App\Models\AdminGudang,ID_ADMIN_GUDANG|integer',
            'tgl_kedatangan' => 'required|date',
            'total_berat' => 'required|numeric|min:0',
            'jumlah_karung_sak' => 'required|numeric|min:0',
            'isi_karung' => 'required|numeric|min:0'
        ]);

        $penerimaan_bahan_baku = new PenerimaanBahanBaku;
        $penerimaan_bahan_baku->id_supplier = $request->id_supplier;
        $penerimaan_bahan_baku->kode_bahan_baku = $request->kode_bahan_baku;
        $penerimaan_bahan_baku->id_admin_gudang = $request->id_admin_gudang;
        $penerimaan_bahan_baku->tgl_kedatangan = $request->tgl_kedatangan;
        $penerimaan_bahan_baku->satuan = "kg";
        $penerimaan_bahan_baku->total_berat = $request->total_berat;
        $penerimaan_bahan_baku->jumlah_karung_sak = $request->jumlah_karung_sak;
        $penerimaan_bahan_baku->isi_karung = $request->isi_karung;
        $penerimaan_bahan_baku->stok_penerimaan = $request->total_berat;
        $penerimaan_bahan_baku->save();

        return redirect('/admin-gudang/penerimaan-bahan-baku');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required|exists:App\Models\Supplier,ID_SUPPLIER|integer',
            'kode_bahan_baku' => 'required|exists:App\Models\BahanBaku,KODE_BAHAN_BAKU|integer',
            'tgl_kedatangan' => 'required|date',
            'total_berat' => 'required|numeric|min:0',
            'jumlah_karung_sak' => 'required|numeric|min:0',
            'isi_karung' => 'required|numeric|min:0'
        ]);

        $penerimaan_bahan_baku = PenerimaanBahanBaku::find($request->id_penerimaan);
        $penerimaan_bahan_baku->id_supplier = $request->id_supplier;
        $penerimaan_bahan_baku->kode_bahan_baku = $request->kode_bahan_baku;
        $penerimaan_bahan_baku->id_admin_gudang = $request->id_admin_gudang;
        $penerimaan_bahan_baku->tgl_kedatangan = $request->tgl_kedatangan;
        $penerimaan_bahan_baku->total_berat = $request->total_berat;
        $penerimaan_bahan_baku->jumlah_karung_sak = $request->jumlah_karung_sak;
        $penerimaan_bahan_baku->isi_karung = $request->isi_karung;
        $penerimaan_bahan_baku->stok_penerimaan = $request->total_berat;
        $penerimaan_bahan_baku->save();

        return redirect('/admin-gudang/penerimaan-bahan-baku');
    }
}
