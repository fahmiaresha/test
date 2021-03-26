@extends('layouts/owner/main')
@section('title', 'Laporan Transaksi Supplier')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-laporan-transaksi.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Laporan Transaksi Supplier</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Per Tanggal
                @php
                    echo "01" . date("/m/Y") . " - " . date("d/m/Y");
                @endphp
                </h5>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-1">
                        <div class="card-body">
                            <h6 class="card-title">
                                Jumlah Transaksi
                            </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                            <i class="ti-layers"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">{{$jumlah_transaksi}} Transaksi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-1">
                        <div class="card-body">
                            <h6 class="card-title">
                                Jumlah Biaya Transaksi
                            </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                            <i class="ti-money"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">IDR {{number_format($pembayaran,0,',','.')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="judul-tabel mt-3">
                <h5>Daftar Transaksi</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable-component table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Biaya Transaksi (IDR)</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerimaan as $d)
                                <tr>
                                    <td>{{date('d/m/Y',strtotime($d->TGL_KEDATANGAN))}}</td>
                                    <td>{{$d->supplier->NAMA_SUPPLIER}}</td>
                                    <td>{{number_format($d->BIAYA_TRANSAKSI,0,',','.')}}</td>
                                    <td>
                                        <button class="btn btn-linkedin btn-sm" data-toggle="modal" data-target="#modal-detail-transaksi-{{$d->ID_PENERIMAAN}}">
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
<!-- ./ Content -->
@foreach($penerimaan as $d)
{{-- Start Modal Detail Transaksi --}}
<div class="modal fade" id="modal-detail-transaksi-{{$d->ID_PENERIMAAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>Tanggal</h5>
                        <h6>{{date('d/m/Y',strtotime($d->TGL_KEDATANGAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier</h5>
                        <h6>{{$d->supplier->NAMA_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Barang</h5>
                        <h6>{{$d->bahan_baku->NAMA_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah (Kg)</h5>
                        <h6>{{$d->TOTAL_BERAT}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Biaya Transaksi (IDR)</h5>
                        <h6>{{number_format($d->BIAYA_TRANSAKSI,0,',','.')}}</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Modal Detail Transaksi --}}
@endforeach

@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-laporan-transaksi.js') }}"></script>
@endsection