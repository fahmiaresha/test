<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $data = Supplier::all();
        return view('/admin-gudang/supplier')->with(compact('data', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:50|regex:/^[a-zA-Z ]+$/',
            'alamat_supplier' => 'required|string|max:100',
            'no_telp_supplier' => 'nullable|string|regex:/^[0-9+]+$/',
            'email_supplier' => 'nullable|string|email',
            'kota' => 'required|exists:App\Models\IndonesiaCity,id|integer'
        ]);

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->email_supplier = $request->email_supplier;
        $supplier->kode_kota = $request->kota;
        $supplier->save();

        return redirect('/admin-gudang/supplier');
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
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'kota' => 'required'
        ]);

        $supplier = Supplier::find($request->id_supplier);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->email_supplier = $request->email_supplier;
        $supplier->kode_kota = $request->kota;
        $supplier->save();

        return redirect('/admin-gudang/supplier');
    }

    public function getKota($id_supplier)
    { 
        $depo = Supplier::where('ID_SUPPLIER',$id_supplier);

        return $depo->value('KODE_KOTA');
    }
}
