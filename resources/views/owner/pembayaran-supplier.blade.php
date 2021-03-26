@extends('layouts/owner/main')
@section('title', 'Pembayaran ke Supplier')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">    
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Pembayaran ke Supplier</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Riwayat Penerimaan bahan baku --}}
            <div class="judul-tabel mb-3">
                <h5>Riwayat Penerimaan Bahan Baku</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component" id="belum-bayar">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Konfirmasi Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    @if(!($d->STATUS_PEMBAYARAN))
                                            <tr id="{{$d->KODE_PEMBAYARAN}}">
                                            <td>{{date("Y-m-d",strtotime($d->TGL_PEMBAYARAN))}}</td>
                                            <td>{{$d->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}</td>
                                            <td id="status-{{$d->KODE_PEMBAYARAN}}">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input switch-bayar" id="konfirmasi-bayar-{{$d->KODE_PEMBAYARAN}}" unchecked>
                                                    <label class="custom-control-label label-bayar text-danger" for="konfirmasi-bayar-{{$d->KODE_PEMBAYARAN}}" id="label-{{$d->KODE_PEMBAYARAN}}">Belum Bayar
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-penerimaan-bahan-baku-{{$d->KODE_PEMBAYARAN}}">
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
            {{-- End of Riwayat Penerimaan bahan baku --}}

            {{-- Start Riwayat Pembayaran --}}
            <div class="judul-tabel mb-3">
                <h5>Riwayat Pembayaran</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component tabel-riwayat">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    @if($d->STATUS_PEMBAYARAN)
                                        <tr>
                                            <td>{{date("Y-m-d",strtotime($d->TGL_PEMBAYARAN))}}</td>
                                            <td>{{$d->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}</td>
                                            <td>
                                                <div class="text-success">Sudah Bayar</div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-penerimaan-bahan-baku-{{$d->KODE_PEMBAYARAN}}">
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
            {{-- End of Riwayat Pembayaran--}}
        </div>
    </div>

</div>
<!-- ./ Content -->
@foreach($data as $d)
<div class="modal fade" id="modal-detail-penerimaan-bahan-baku-{{$d->KODE_PEMBAYARAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>ID Penerimaan</h5>
                        <h6>{{$d->penerimaan_bahan_baku->ID_PENERIMAAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Penerimaan</h5>
                        <h6>{{date("d/m/Y",strtotime($d->penerimaan_bahan_baku->TGL_KEDATANGAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Gudang</h5>
                        <h6>{{$d->penerimaan_bahan_baku->admin_gudang->NAMA_ADMIN_GUDANG}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier</h5>
                        <h6>{{$d->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Bahan Baku</h5>
                        <h6>{{$d->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Karung</h5>
                        <h6>{{$d->penerimaan_bahan_baku->JUMLAH_KARUNG_SAK}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat per Karung (Kg)</h5>
                        <h6>{{$d->penerimaan_bahan_baku->ISI_KARUNG}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat Total (Kg)</h5>
                        <h6>{{$d->penerimaan_bahan_baku->TOTAL_BERAT}}</h6>
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
    <script src="{{ asset('/assets/js/owner-pembayaran-supplier.js') }}"></script>
    <script src="{{ asset('/assets/sweetalert/sweetalert2.all.js') }}"></script>
@endsection