@extends('layouts/manajer-marketing/main')
@section('title', 'Order Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content ">
    <div class="page-header">
        <h4>Order Barang</h4>
        <hr>
    </div>

    {{-- List order barang belum dikonfirmasi --}}
    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Konfirmasi Order Barang</h5>
                <a href="{{ url('/manajer-marketing/order-barang/input') }}" class="btn btn-sm btn-rounded bg-dribbble ml-auto">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="order-barang-table" class="table table-bordered table-striped table-responsive-stack datatable-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID Order</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Konfirmasi Order</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr id="{{$d->ID_PENJUALAN}}">
                                <td>{{$d->ID_PENJUALAN}}</td>
                                <td>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</td>
                                <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                <td id="status-{{$d->ID_PENJUALAN}}">
                                    <div class="custom-konfirmasi" id="tombol-{{$d->ID_PENJUALAN}}">
                                        <label class="label-konfirmasi-{{$d->ID_PENJUALAN}}" for="label-konfirmasi" id="label-konfirmasi-{{$d->ID_PENJUALAN}}">
                                            <button type="button" class="btn btn-sm btn-success" id="konfirmasi-{{$d->ID_PENJUALAN}}">
                                                KONFIRMASI
                                            </button>
                                        </label>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                        data-target="#modal-detail-order-barang-{{$d->ID_PENJUALAN}}">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    {{-- List order barang sudah dikonfirmasi --}}
    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Riwayat Order Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive-stack datatable-table" id="tabel-riwayat">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID Order</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Konfirmasi Order</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data2 as $d2)
                            <tr>
                                <td>{{$d2->ID_PENJUALAN}}</td>
                                <td>{{date("d/m/Y",strtotime($d2->TGL_PENJUALAN))}}</td>
                                <td>{{$d2->depo_air_minum->NAMA_DEPO}}</td>
                                <td>
                                    <div>
                                        <span>KONFIRMASI</span>
                                        <i class="fas fa-check ml-1"></i>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                        data-target="#modal-detail-order-barang-konfirmasi-{{$d2->ID_PENJUALAN}}">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- End of Content -->
@foreach($data as $d)
{{-- Start Detail Order Barang Modal --}}
<div class="modal fade" id="modal-detail-order-barang-{{$d->ID_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h6>{{$d->ID_PENJUALAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Sales</h5>
                        <h6>
                            @if($d->ID_SALES_B != null)
                            {{$d->sales_b->NAMA_SALES_B}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>{{$d->depo_air_minum->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->detil_penjualans as $detilp)
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
                        <h6>{{ $d->detil_penjualans->sum('JUMLAH_PCS')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN) - floatval($d->ONGKOS_KIRIM),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN),0,',','.')}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Order Barang Modal--}}
@endforeach

@foreach($data2 as $d)
{{-- Start Detail Order Barang Modal --}}
<div class="modal fade" id="modal-detail-order-barang-konfirmasi-{{$d->ID_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h6>{{$d->ID_PENJUALAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Sales</h5>
                        <h6>
                            @if($d->ID_SALES_B != null)
                            {{$d->sales_b->NAMA_SALES_B}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>{{$d->depo_air_minum->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->detil_penjualans as $detilp)
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
                        <h6>{{ $d->detil_penjualans->sum('JUMLAH_PCS')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN) - floatval($d->ONGKOS_KIRIM),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN),0,',','.')}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Order Barang Modal--}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-order-barang.js') }}"></script>
@endsection