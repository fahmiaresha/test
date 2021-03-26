<?php

namespace App\Http\Controllers\SalesB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepoAirMinum;

class CustomerController extends Controller
{

    public function index()
    {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $data = DepoAirMinum::select('depo_air_minum.*','k.name AS KOTA','p.name AS PROVINSI')
                ->join('indonesia_cities as k','k.id','=','depo_air_minum.KODE_KOTA')
                ->join('indonesia_provinces as p','p.id','=','k.province_id')->get();

        return view('sales-b/customer', compact('data', 'provinsi'));
    }

}
