@extends('layouts/owner/main')
@section('title', 'Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <div class="d-flex">
            <h4>Sales</h4>
            <a href="{{ url('/owner/tambah-pegawai') }}" data-toggle="tooltip" data-placement="bottom" title="Tambah pegawai baru">
                <i class="fas fa-user-plus fa-2x"></i>
            </a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{-- Start Sales A --}}
            <div class="judul-tabel">
                <h5>Daftar Sales A</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_sales_a as $d)
                                <tr>
                                    <td>{{$d->ID_SALES_A}}</td>
                                    <td>{{$d->NAMA_SALES_A}}</td>
                                    <td>
                                        <a href="{{ url('/owner/sales-a/detail/'.$d->ID_SALES_A) }}" class="btn btn-sm btn-linkedin">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </a>
                                        <a href="{{ url('/owner/edit-pegawai',$d->getid_user()) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-users-cog mr-2"></i>
                                            EDIT
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Sales A --}}

            {{-- Start Sales B --}}
            <div class="judul-tabel">
                <h5>Daftar Sales B</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_sales_b as $d)
                                <tr>
                                    <td>{{$d->ID_SALES_B}}</td>
                                    <td>{{$d->NAMA_SALES_B}}</td>
                                    <td>
                                        <a href="{{ url('/owner/sales-b/detail/'.$d->ID_SALES_B) }}" class="btn btn-sm btn-linkedin">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Sales B --}}

        </div>
    </div>
</div>
{{-- End of Content --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-pegawai.js') }}"></script>
@endsection