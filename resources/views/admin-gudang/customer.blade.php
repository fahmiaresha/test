@extends('layouts/admin-gudang/main')
@section('title', 'Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Daftar Customer</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Customer</th>
                                    <th scope="col">Nama Customer</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->KODE_DEPO}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                    <td>{{$d->ALAMAT_DEPO}}, {{$d->KOTA}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal"
                                            data-target="#modal-detail-customer-{{$d->KODE_DEPO}}">
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
</div>
{{-- End of Content --}}
@foreach($data as $d)
{{-- Start Detail Customer Modal --}}
<div class="modal fade" id="modal-detail-customer-{{$d->KODE_DEPO}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Customer</h5>
                        <h6>{{$d->KODE_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Customer</h5>
                        <h6>{{$d->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Contact Person</h5>
                        <h6>{{$d->NAMA_CUSTOMER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>{{$d->ALAMAT_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>{{$d->KOTA}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>{{$d->PROVINSI}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Telepon</h5>
                        <h6>@if($d->NO_TELP_DEPO != null)
                            {{$d->NO_TELP_DEPO}}
                            @else
                            N\A
                            @endif</h6>
                    </div>

                    <div class="my-3">
                        <h5>Email</h5>
                        <h6>@if($d->EMAIL_DEPO != null)
                            {{$d->EMAIL_DEPO}}
                            @else
                            N\A
                            @endif</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Customer Modal --}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-customer.js') }}"></script>
@endsection