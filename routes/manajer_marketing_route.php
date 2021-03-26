<?php

Route::middleware(['auth', 'manajer-marketing'])->group(function () {
    // Route dashboard
    Route::get('/manajer-marketing', 'DashboardController@manajer_marketing')->name('manajer-marketing');

    // Route baru, bisa dimodif
    Route::get('/manajer-marketing/edit-profil', function() {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

        return view('manajer-marketing/edit-profil', compact('provinsi'));
    });
    Route::post('/manajer-marketing/edit-profil', 'ProfileController@editPegawai');
    // End Route baru, bisa dimodif

    // Route customer
    Route::get('/manajer-marketing/customer', 'ManajerMarketing\CustomerController@index');
    Route::post('/manajer-marketing/customer/insert', 'ManajerMarketing\CustomerController@create');
    Route::post('/manajer-marketing/customer/edit', 'ManajerMarketing\CustomerController@update');
    Route::get('/manajer-marketing/getKota/{kode_depo}', 'ManajerMarketing\CustomerController@getKota');

    // Route order barang
    Route::get('/manajer-marketing/order-barang', 'ManajerMarketing\OrderBarangController@index');
    Route::get('/manajer-marketing/order-barang/input', 'ManajerMarketing\OrderBarangController@insert');
    Route::get('/manajer-marketing/order-barang/products/{jenis}', 'ManajerMarketing\OrderBarangController@getProducts');
    Route::get('/manajer-marketing/order-barang/products/', 'ManajerMarketing\OrderBarangController@getAllProduct');
    Route::post('/manajer-marketing/order-barang/input/store', 'ManajerMarketing\OrderBarangController@store');
    Route::post('/manajer-marketing/status-konfirmasi', 'ManajerMarketing\OrderBarangController@changeStatus');

    // Route evaluasi kinerja sales
    Route::get('/manajer-marketing/evaluasi-kinerja-sales', 'ManajerMarketing\EvaluasiKinerjaSalesController@index');
    Route::get('/manajer-marketing/evaluasi-kinerja-sales-a/{id}/input', 'ManajerMarketing\SalesController@insertA');
    Route::get('/manajer-marketing/evaluasi-kinerja-sales-b/{id}/input', 'ManajerMarketing\SalesController@insertB');

    Route::post('/manajer-marketing/evaluasi-kinerja-sales/store', 'ManajerMarketing\SalesController@EvaluasiKinerjaSales');

    // Route sales
    Route::get('/manajer-marketing/sales', 'ManajerMarketing\SalesController@index');
    Route::get('/manajer-marketing/detail-sales-a/{id}', 'ManajerMarketing\SalesController@viewA');
    Route::get('/manajer-marketing/detail-sales-b/{id}', 'ManajerMarketing\SalesController@viewB');

    // handle ajax request data kota sesuai provinsi yang dipilih
    Route::post('/manajer-marketing/req-data-kota', function() {
        $id_provinsi = $_POST['id'];
        $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

        return response()->json($kota);
    });
});