<?php

Route::middleware(['auth', 'admin-gudang'])->group(function () {
    // Route dashboard
    Route::get('/admin-gudang', 'DashboardController@AdminGudang')->name('admin-gudang');

    // Route baru, bisa dimodif
    Route::get('/admin-gudang/edit-profil', function() {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

        return view('admin-gudang/edit-profil', compact('provinsi'));
    });
    Route::post('/admin-gudang/edit-profil', 'ProfileController@editPegawai');
    // End Route baru, bisa dimodif

    // Route penerimaan
    Route::get('/admin-gudang/penerimaan-bahan-baku', 'AdminGudang\PenerimaanBahanBakuController@index');
    Route::post('/admin-gudang/penerimaan-bahan-baku/edit', 'AdminGudang\PenerimaanBahanBakuController@update');
    Route::post('/admin-gudang/penerimaan-bahan-baku/insert', 'AdminGudang\PenerimaanBahanBakuController@create');

    // Route supplier
    Route::get('/admin-gudang/supplier', 'AdminGudang\SupplierController@index');
    Route::post('/admin-gudang/supplier/edit', 'AdminGudang\SupplierController@update');
    Route::post('/admin-gudang/supplier/insert', 'AdminGudang\SupplierController@create');
    Route::get('/admin-gudang/supplier/getKota/{id_supplier}', 'AdminGudang\SupplierController@getKota');

    // Route pengiriman
    Route::get('/admin-gudang/pengiriman-barang','AdminGudang\PengirimanBarangController@index');
    Route::get('/admin-gudang/pengiriman-barang/edit', 'AdminGudang\PengirimanBarangController@edit');
    Route::post('/admin-gudang/pengiriman-barang/store', 'AdminGudang\PengirimanBarangController@store');

    // Route customer
    Route::get('/admin-gudang/customer', 'AdminGudang\CustomerController@index');

    // handle ajax request data kota sesuai provinsi yang dipilih
    Route::post('/admin-gudang/req-data-kota', function() {
        $id_provinsi = $_POST['id'];
        $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

        return response()->json($kota);
    });
});