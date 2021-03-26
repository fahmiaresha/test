@extends('layouts/manajer-marketing/main')
@section('title', 'Riwayat Evaluasi Kinerja Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Evaluasi Kinerja Sales</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Sales A --}}
            <div class="judul-tabel">
                <h5>Riwayat Evaluasi Kinerja Sales A</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-a-table" class="table table-bordered table-stripped table-responsive-stack datatable-table">
                        <thead class="thead-dark">
                            <th scope="col">ID Evaluasi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($salesA as $a)
                            @php
                                if($a->EVALUASI_SALESA == "Tidak Memenuhi Target"){
                                    $tr = 'table-danger';
                                }
                                elseif($a->EVALUASI_SALESA == "Telah Memenuhi Target"){
                                    $tr = 'table-default';
                                }
                            @endphp
                            <tr class="{{$tr}}">
                                <td>{{$a->ID_EVALUASI_KINERJA_SALESA}}</td>
                                <td>{{$a->TGL_EVALUASI_KINERJA_SALESA}}</td>
                                <td>{{$a->nama_sales_a}}</td>
                                <td>
                                    <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-evaluasi-salesa-{{$a->ID_EVALUASI_KINERJA_SALESA}}">
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
            {{-- End of Sales A --}}

            {{-- Start Sales B --}}
            <div class="judul-tabel">
                <h5>Riwayat Evaluasi Kinerja Sales B</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-b-table" class="table table-bordered table-stripped table-responsive-stack datatable-table">
                        <thead class="thead-dark">
                            <th scope="col">ID Evaluasi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($salesB as $b)
                            @php
                                if($b->EVALUASI_SALESB == "Tidak Memenuhi Target"){
                                    $tr = 'table-danger';
                                }
                                elseif($b->EVALUASI_SALESB == "Telah Memenuhi Target"){
                                    $tr = 'table-default';
                                }
                            @endphp
                            <tr class="{{$tr}}">
                                <td>{{$b->ID_EVALUASI_KINERJA_SALESB}}</td>
                                <td>{{$b->TGL_EVALUASI_KINERJA_SALESB}}</td>
                                <td>{{$b->nama_sales_b}}</td>
                                <td>
                                    <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-evaluasi-salesb-{{$b->ID_EVALUASI_KINERJA_SALESB}}">
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
            {{-- End of Sales B --}}
        </div>
    </div>
</div>
{{-- End of Content --}}
@foreach($salesA as $a)
{{-- Start Detail Evaluasi Sales A Modal --}}
<div class="modal fade" id="modal-detail-evaluasi-salesa-{{$a->ID_EVALUASI_KINERJA_SALESA}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>ID Evaluasi</h5>
                        <h6>{{$a->ID_EVALUASI_KINERJA_SALESA}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Evaluasi</h5>
                        <h6>{{$a->TGL_EVALUASI_KINERJA_SALESA}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Manajer Marketing</h5>
                        <h6>{{$a->nama_manajer_marketing}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>ID Sales</h5>
                        <h6>{{$a->ID_SALES_A}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Sales</h5>
                        <h6>{{$a->nama_sales_a}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jabatan</h5>
                        <h6>Sales A</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi</h5>
                        <p>
                            {{$a->EVALUASI_SALESA}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Evaluasi Sales A Modal --}}
@endforeach
@foreach($salesB as $b)
{{-- Start Detail Evaluasi Sales B Modal --}}
<div class="modal fade" id="modal-detail-evaluasi-salesb-{{$b->ID_EVALUASI_KINERJA_SALESB}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>ID Evaluasi</h5>
                        <h6>{{$b->ID_EVALUASI_KINERJA_SALESB}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Evaluasi</h5>
                        <h6>{{$b->TGL_EVALUASI_KINERJA_SALESB}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Manajer Marketing</h5>
                        <h6>{{$b->nama_manajer_marketing}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>ID Sales</h5>
                        <h6>{{$b->ID_SALES_B}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Sales</h5>
                        <h6>{{$b->nama_sales_b}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jabatan</h5>
                        <h6>Sales B</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi</h5>
                        <p>
                            {{$b->EVALUASI_SALESB}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Evaluasi Sales B Modal --}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-evaluasi-sales.js') }}"></script>
@endsection