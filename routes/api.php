<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\City;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/kota', function(Request $request) {
    $id_provinsi = $request->id_provinsi;
    $kota = City::where('province_id', $id_provinsi)->get();

    return response()->json($kota);
});