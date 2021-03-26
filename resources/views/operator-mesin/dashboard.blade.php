@extends('layouts/operator-mesin/main')
@section('title', 'Dashboard')
@section('extra-css')  
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/operator-mesin.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">Laporan Pencatatan Produksi</h6>
                    </div>
                    <div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Sudah Selesai</h5>
                                    <div>Jumlah transaksi yang telah selesai dilakukan pencatatan hasil produksi</div>
                                </div>
                                <h1 class="text-primary mb-0">{{$Selesai}}</h1>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Belum Selesai</h5>
                                    <div>Jumlah transaksi yang belum dilakukan pencatatan hasil produksi</div>
                                </div>
                                <h1 class="text-dark mb-0">{{$BelumSelesai}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 d-flex align-items-center">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Plastik Bekas</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">{{$StockPlastikBekas->STOK_BAHAN_BAKU}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Plastik Virgin</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-success text-info rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">{{$StockPlastikVirgin->STOK_BAHAN_BAKU}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Pewarna</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-warning text-secondary rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">{{$StockPewarna->STOK_BAHAN_BAKU}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="judul-tabel mt-4 ml-4">
                    <h5>Rekap Daftar Operator Mesin Yang Belum Selesai Di Lakukan Pencatatan Produksi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID PENGAMBILAN BAHAN BAKU</th>
                                <th scope="col">WAKTU PENGAMBILAN BAHAN BAKU</th>
                                <th scope="col">OPERATOR MESIN</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}</td>
                                    <td>{{$d->pengambilan_bahan_baku->WAKTU_PENGAMBILAN}}</td>
                                    <td>{{$d->pengambilan_bahan_baku->operator_mesin->NAMA_OPERATOR_MESIN}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-dashboard.js') }}"></script>
@endsection