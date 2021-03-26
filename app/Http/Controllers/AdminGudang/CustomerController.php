<?php

namespace App\Http\Controllers\AdminGudang;
use App\Http\Controllers\Controller;
use App\Models\DepoAirMinum;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DepoAirMinum::select('depo_air_minum.*','k.name AS KOTA','p.name AS PROVINSI')->join('indonesia_cities as k','k.id','=','depo_air_minum.KODE_KOTA')->join('indonesia_provinces as p','p.id','=','k.province_id')->get();
        return view('/admin-gudang/customer')->with(compact("data"));
    }
}
