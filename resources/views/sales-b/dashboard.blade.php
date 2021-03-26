@extends('layouts/sales-b/main')
@section('title', 'Dashboard')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">Laporan Order Barang</h6>
                    </div>
                    <div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Order Selesai</h5>
                                    <div>Jumlah transaksi order barang yang selesai</div>
                                </div>
                                <h3 class="text-primary mb-0">{{$data_order[0]}}</h3>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Order Diproses</h5>
                                    <div>Jumlah transaksi order barang yang masih di proses</div>
                                </div>
                                <div>
                                    <h3 class="text-dark mb-0">{{$data_order[1]}}</h3>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Total Transaksi Order</h5>
                                    <div>Jumlah transaksi order yang telah masuk</div>
                                </div>
                                <div>
                                    <h3 class="text-danger mb-0">{{$data_order[2]}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-2">Laporan Follow Up Customer</h6>
                    </div>
                    <div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Order</h5>
                                    <div>Jumlah depo yang jadi order hasil follow up</div>
                                </div>
                                <h3 class="text-primary mb-0">{{$data_konfirmasi[0]}}</h3>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Tidak Order</h5>
                                    <div>Jumlah depo yang tidak jadi order hasil follow up</div>
                                </div>
                                <div>
                                    <h3 class="text-dark mb-0">{{$data_konfirmasi[1]}}</h3>
                                </div>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h5>Belum Konfirmasi</h5>
                                    <div>Jumlah depo yang belum di follow up status ordernya</div>
                                </div>
                                <div>
                                    <h3 class="text-danger mb-0">{{$data_konfirmasi[2]}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="card-title mb-4 text-center">Total Penjualan Bulan ini</h6>
                        <h2 class="font-size-35 font-weight-bold text-center">Rp {{ number_format($data_order[3],'0',',','.') }}</h2>
                        <p>Angka diatas menunjukkan total penjualan barang pada bulan ini</p>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-6">
            <div class="card bg-info-bright">
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="card-title mb-4 text-center">Total Penjualan Minggu Ini</h6>
                        <h2 class="font-size-35 font-weight-bold text-center">Rp {{ number_format($data_order[4],'0',',','.') }}</h2>
                        <p>Angka diatas menunjukkan total penjualan barang pada minggu ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Daftar Depo Yang Belum Di Follow Up</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered datatable-table table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                @foreach($data_konfirmasi[3] as $d)
                                <tr>
                                    <td>{{$d->KODE_DEPO}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                    <td>{{$d->ALAMAT_DEPO}}, {{$d->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Daftar Depo Telah Di Follow Up (Status Order)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                @foreach($data_konfirmasi[4] as $d)
                                <tr>
                                    <td>{{$d->KODE_DEPO}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                    <td>{{$d->ALAMAT_DEPO}}, {{$d->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-12">
            
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Daftar Customer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                @foreach($data_customer as $d)
                                <tr>
                                    <td>{{$d->KODE_DEPO}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                    <td>{{$d->ALAMAT_DEPO}}, {{$d->indonesia_city->name}}</td>
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
    <script src="{{ asset('/assets/js/sales-b-dashboard.js') }}"></script>
@endsection