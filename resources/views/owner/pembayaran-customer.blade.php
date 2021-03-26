@extends('layouts/owner/main')
@section('title', 'Pembayaran Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">    
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Pembayaran Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Order Barang --}}
            <div class="judul-tabel mb-3">
                <h5>Order Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Konfirmasi Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    @if(!($d->STATUS_PEMBAYARAN))
                                    <tr id="{{$d->KODE_PEMBAYARAN_PENJUALAN}}">
                                        <td>{{date("Y-m-d",strtotime($d->TGL_PEMBAYARAN))}}</td>
                                        <td>{{$d->penjualan->depo_air_minum->NAMA_DEPO}}</td>
                                        <td id="status-{{$d->KODE_PEMBAYARAN_PENJUALAN}}">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input switch-bayar" id="konfirmasi-bayar-{{$d->KODE_PEMBAYARAN_PENJUALAN}}">
                                                <label class="custom-control-label label-bayar text-danger" for="konfirmasi-bayar-{{$d->KODE_PEMBAYARAN_PENJUALAN}}" id="label-{{$d->KODE_PEMBAYARAN_PENJUALAN}}">Belum Bayar
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-order-barang-{{$d->KODE_PEMBAYARAN_PENJUALAN}}">
                                                <i class="fas fa-info-circle mr-2"></i>
                                                DETAIL
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Order Barang --}}

            {{-- Start Riwayat Order Barang --}}
            <div class="judul-tabel mb-3">
                <h5>Riwayat Order Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tabel-riwayat table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Konfirmasi Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    @if($d->STATUS_PEMBAYARAN)
                                    <tr>
                                        <td>{{date("Y-m-d",strtotime($d->TGL_PEMBAYARAN))}}</td>
                                        <td>{{$d->penjualan->depo_air_minum->NAMA_DEPO}}</td>
                                        <td>
                                            <div class="text-success">Sudah Bayar</div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-order-barang-{{$d->KODE_PEMBAYARAN_PENJUALAN}}">
                                                <i class="fas fa-info-circle mr-2"></i>
                                                DETAIL
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Riwayat Order Barang --}}
        </div>
    </div>

</div>
<!-- ./ Content -->
@foreach($data as $d)
<div class="modal fade" id="modal-detail-order-barang-{{$d->KODE_PEMBAYARAN_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Order Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>ID Order</h5>
                        <h6>{{$d->penjualan->ID_PENJUALAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>{{date("d/m/Y",strtotime($d->penjualan->TGL_PENJUALAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Sales</h5>
                        <h6>{{$d->penjualan->sales_b->NAMA_SALES_B}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>{{$d->penjualan->depo_air_minum->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->penjualan->detil_penjualans as $detilp)
                                <tr>
                                    <td>{{$detilp->product->NAMA_PRODUCT}}</td>
                                    <td>{{$detilp->JUMLAH_PCS}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="my-3">
                        <h5>Total Item (pcs)</h5>
                        <h6>{{ $d->penjualan->detil_penjualans->sum('JUMLAH_PCS')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>{{ number_format(floatval($d->penjualan->TOTAL_PENJUALAN-$d->penjualan->ONGKOS_KIRIM),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->penjualan->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{number_format($d->penjualan->TOTAL_PENJUALAN,0,',','.')}}</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-pembayaran-customer.js') }}"></script>
    <script src="{{ asset('/assets/sweetalert/sweetalert2.all.js') }}"></script>
@endsection