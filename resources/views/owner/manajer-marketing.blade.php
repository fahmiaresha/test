@extends('layouts/owner/main')
@section('title', 'Manajer Marketing')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-detail-pegawai.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <div class="d-flex">
            <h4>Manajer Marketing</h4>
            <a href="{{ url('/owner/tambah-pegawai') }}" data-toggle="tooltip" data-placement="bottom" title="Tambah pegawai baru">
                <i class="fas fa-user-plus fa-2x"></i>
            </a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="judul-tabel">
                <h5>Daftar Manajer Marketing</h5>
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
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->ID_MANAJER_MARKETING}}</td>
                                    <td>{{$d->NAMA_MANAJER_MARKETING}}</td>
                                    <td colspan="2">
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pegawai-{{$d->ID_MANAJER_MARKETING}}">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </button>
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
        </div>
    </div>
</div>
{{-- End of Content --}}
@foreach($data as $d)
{{-- Start Detail Pegawai Modal --}}
<div class="modal fade" id="modal-detail-pegawai-{{$d->ID_MANAJER_MARKETING}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center">

                    <div class="card card-pegawai">
                        <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                            <figure class="avatar avatar-xl">
                                @if($d->FOTO_PROFILE != null)
                        <img src="{{ asset($d->FOTO_PROFILE) }}" class="rounded-circle" alt="avatar">
                        @else
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                        @endif
                            </figure>
                            <div class="badge badge-dark nama-sales">
                                {{$d->NAMA_MANAJER_MARKETING}}
                            </div>
                        </div>

                        <div class="card-body card-body-profile">
                            <table class="profil-table">
                                <tr>
                                    <td class="label-detail">ID Pegawai</td>
                                    <td>{{$d->ID_MANAJER_MARKETING}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jabatan</td>
                                    <td>Manajer Marketing</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jenis Kelamin</td>
                                    <td>
                                        @if($d->JENIS_KELAMIN_MANAJER_MARKETING)
                                            Pria
                                        @else
                                            Wanita
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Alamat</td>
                                    <td>{{$d->ALAMAT_MANAJER_MARKETING}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Kota/Kabupaten</td>
                                    <td>{{$d->indonesia_city->name}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Provinsi</td>
                                    <td>{{$d->indonesia_city->indonesia_province->name}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Telepon</td>
                                    <td>{{$d->NO_TELP_MANAJER_MARKETING}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Email</td>
                                    <td>{{$d->EMAIL_MANAJER_MARKETING}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pegawai Modal --}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-pegawai.js') }}"></script>
@endsection