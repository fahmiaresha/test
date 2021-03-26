@extends('layouts/sales-a/main')
@section('title', 'Dashboard')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-a.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">
    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">     
        <div class="col-md-12">
            <div class="judul-tabel mb-3">
                <h5>Rekap Input Customer (@php echo date('F Y'); @endphp)</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
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

    <div class="row">     
        <div class="col-md-12">
            <div class="judul-tabel mb-3">
                <h5>Rekap Input Customer (Total)</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d2)
                                <tr>
                                    <td>{{$d2->KODE_DEPO}}</td>
                                    <td>{{$d2->NAMA_DEPO}}</td>
                                    <td>{{$d2->ALAMAT_DEPO}}, {{$d2->indonesia_city->name}}</td>
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
    <script src="{{ asset('/assets/js/sales-a-dashboard.js') }}"></script>
@endsection