<?php

Route::middleware(['auth', 'owner'])->group(function () {

    Route::get('/owner/laporan/transaksi-supplier', 'Owner\LaporanSupplierController@index');
    Route::get('/owner/laporan/transaksi-customer', 'Owner\LaporanCustomerController@LaporanCustomer');

    // Route dashboard
    Route::get('/owner', 'DashboardController@Owner')->name('owner');

    Route::get('/owner/edit-profil', function() {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');

        return view('owner/edit-profil', compact('provinsi'));
    });
    Route::post('/owner/edit-profil', 'ProfileController@editPegawai');

    // Route pegawai
    Route::view('/owner/detail-pegawai', 'owner/detail-pegawai');

    Route::get('/owner/edit-pegawai/{id}', function($id) {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        $jenis = \App\Models\User::find($id)->jabatan()->value('NAMA_JABATAN');
        return view('owner/edit-pegawai', compact('provinsi','id','jenis'));
    });

    Route::get('/owner/tambah-pegawai', function() {
        $provinsi = \Laravolt\Indonesia\Models\Province::pluck('name', 'id');
        return view('owner/tambah-pegawai', compact('provinsi'));
    });

    Route::get('/owner/sales', 'Owner\PegawaiController@indexSales');
    Route::get('/owner/sales-a/detail/{id}', 'Owner\PegawaiController@viewSalesA');
    Route::get('/owner/sales-b/detail/{id}', 'Owner\PegawaiController@viewSalesB');
    Route::get('/owner/admin-gudang', 'Owner\PegawaiController@indexAdminGudang');
    Route::get('/owner/manajer-marketing', 'Owner\PegawaiController@indexManajerMarketing');
    Route::get('/owner/operator-mesin', 'Owner\PegawaiController@indexOperatorMesin');
    Route::post('/owner/pegawai/store', 'Owner\PegawaiController@store');

    // Route pembayaran
    Route::get('/owner/pembayaran-supplier', 'Owner\PembayaranSupplierController@index');
    Route::post('/owner/pembayaran-supplier/update', 'Owner\PembayaranSupplierController@update');

    Route::get('/owner/pembayaran-customer', 'Owner\PembayaranCustomerController@index');
    Route::post('/owner/pembayaran-customer/update', 'Owner\PembayaranCustomerController@update');

    // handle ajax request data kota sesuai provinsi yang dipilih
    Route::post('/owner/req-data-kota', function() {
        $id_provinsi = $_POST['id'];
        $kota = \Laravolt\Indonesia\Models\City::where('province_id', $id_provinsi)->pluck('name', 'id');

        return response()->json($kota);
    });

});