<?php

Route::middleware(['auth', 'sales-a'])->group(function () {
    // Route dashboard
    Route::get('/sales-a','DashboardController@salesA')->name('sales-a');

    // Route baru, bisa dimodif
    Route::get('/sales-a/edit-profil', function() {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

        return view('sales-a/edit-profil', compact('provinsi'));
    });
    Route::post('/sales-a/edit-profil', 'ProfileController@editPegawai');
    // End Route baru, bisa dimodif

    // Route customer
    Route::get('/sales-a/customer', 'SalesA\CustomerController@index');
    Route::post('/sales-a/customer/insert', 'SalesA\CustomerController@create');
    Route::post('/sales-a/customer/edit', 'SalesA\CustomerController@update');
    Route::get('/sales-a/getKota/{kode_depo}', 'SalesA\CustomerController@getKota');

    // handle ajax request data kota sesuai provinsi yang dipilih
    Route::post('/sales-a/req-data-kota', function() {
        $id_provinsi = $_POST['id'];
        $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

        return response()->json($kota);
    });
});