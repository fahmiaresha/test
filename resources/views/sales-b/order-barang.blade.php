@extends('layouts/sales-b/main')
@section('title', 'Order Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-b.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content ">
    <div class="page-header">
        <h4>Order Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Riwayat Order Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-barang-table"
                            class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Order</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->ID_PENJUALAN}}</td>
                                    <td>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</td>
                                    <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                    <td>
                                        @if($d->STATUS_PENJUALAN == 1 && $d->KODE_PEMBAYARAN_PENJUALAN != "" &&
                                        $d->KODE_PENGIRIMAN != "")
                                        <div class="badge badge-success">
                                            SELESAI
                                            <i class="fas fa-check ml-1"></i>
                                        </div>
                                        @else
                                        <div class="badge badge-secondary">
                                            DIPROSES
                                            <i class="fas fa-exclamation-circle ml-1"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                            data-target="#modal-detail-order-barang-{{$d->ID_PENJUALAN}}">
                                            <i class="fas fa-info-circle mr-2"></i>
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
                        <h5>Tanggal Order</h5>
                        <h6>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</h6>
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
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN-$d->ONGKOS_KIRIM),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{number_format($d->TOTAL_PENJUALAN,0,',','.')}}</h6>
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        <a href="{{url('/nota-penjualan/'.$d->ID_PENJUALAN)}}" class="btn btn-md btn-google">
                            <i class="far fa-file-alt mr-2"></i>
                            NOTA PENJUALAN
                        </a>
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
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/sales-b-order-barang.js') }}"></script>
@endsection