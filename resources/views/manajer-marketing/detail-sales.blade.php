@extends('layouts/manajer-marketing/main')
@section('title', 'Detail Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing-detail-sales.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Detail Sales</h4>
        <hr>
    </div>

    <div class="row">
        {{-- Start detail profil sales --}}
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card" style="">
                <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                    <figure class="avatar avatar-xl">
                        @if($data->FOTO_PROFILE != null)
                        <img src="{{ asset($data->FOTO_PROFILE) }}" class="rounded-circle" alt="avatar">
                        @else
                            @if($jenis_kelamin == 0)
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                            @else
                                <img src="{{ asset('/assets/img/avatar/avatar-4.png') }}" class="rounded-circle" alt="avatar">
                            @endif
                        @endif
                    </figure>
                    <div class="badge badge-dark nama-sales">
                        @if($jabatan == "Sales A")
                        {{$data->NAMA_SALES_A}}
                        @else
                        {{$data->NAMA_SALES_B}}
                        @endif
                    </div>
                </div>
                @if($jabatan == "Sales A")
                <div class="card-body card-body-profile">
                    <table class="profil-table">
                        <tr>
                            <td class="label-detail">ID Sales</td>
                            <td>{{$data->ID_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Sales A</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>@if($data->JENIS_KELAMIN_SALES_A)
                                Pria
                                @else
                                Wanita
                                @endif</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>{{$data->ALAMAT_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>{{$data->indonesia_city->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Provinsi</td>
                            <td>{{$data->indonesia_city->indonesia_province->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepon</td>
                            <td>{{$data->NO_TELP_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>{{$data->EMAIL_SALES_A}}</td>
                        </tr>
                    </table>
                </div>
                @else
                <div class="card-body card-body-profile">
                    <table class="profil-table">
                        <tr>
                            <td class="label-detail">ID Sales</td>
                            <td>{{$data->ID_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Sales B</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>@if($data->JENIS_KELAMIN_SALES_B)
                                Pria
                                @else
                                Wanita
                                @endif</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>{{$data->ALAMAT_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>{{$data->indonesia_city->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Provinsi</td>
                            <td>{{$data->indonesia_city->indonesia_province->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepon</td>
                            <td>{{$data->NO_TELP_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>{{$data->EMAIL_SALES_B}}</td>
                        </tr>
                    </table>
                </div>
                @endif
            </div>
        </div>
        {{-- End of detail profil sales --}}

        {{-- Start rekap kinerja --}}
        <div class="col-md-8 col-sm-12">
            <div class="card-title card-title-detail-kinerja-sales">
                @if($jabatan == "Sales A")
                Rekap Penginputan Customer

                {{-- <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales-a/'.$data->ID_SALES_A.'/input') }}"
                    class="btn btn-sm btn-secondary mr-1">
                    <i class="fas fa-book-open mr-2"></i>
                    EVALUASI
                </a> --}}
                @if($evaluasi != 0)
                    <button class="btn btn-sm btn-secondary mr-1 disabled">
                        <i class="fas fa-book-open mr-2"></i>
                        EVALUASI
                    </button>
                @else
                    <button class="btn btn-sm btn-secondary mr-1" data-toggle="modal" data-target="#evaluasi-modal">
                        <i class="fas fa-book-open mr-2"></i>
                        EVALUASI
                    </button>
                @endif

                @else
                Rekap Penginputan Order

                {{-- <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales-b/'.$data->ID_SALES_B.'/input') }}"
                    class="btn btn-sm btn-secondary mr-1">
                    <i class="fas fa-book-open mr-2"></i>
                    EVALUASI
                </a> --}}
                @if($evaluasi != 0)
                    <button class="btn btn-sm btn-secondary mr-1 disabled">
                        <i class="fas fa-book-open mr-2"></i>
                        EVALUASI
                    </button>
                @else
                    <button class="btn btn-sm btn-secondary mr-1" data-toggle="modal" data-target="#evaluasi-modal">
                        <i class="fas fa-book-open mr-2"></i>
                        EVALUASI
                    </button>
                @endif
                @endif

            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered rekap-table table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                            </thead>
                            <tbody>
                                @if($jabatan == "Sales A")
                                @foreach($data->depo_air_minums as $d)
                                <tr>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                </tr>
                                @endforeach
                                @else
                                @foreach($data->penjualans as $d)
                                <tr>
                                    <td>{{$d->TGL_PENJUALAN}}</td>
                                    <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        {{-- End of rekap kinerja --}}
    </div>
</div>
{{-- End of Content --}}

{{-- Start Evaluasi Modal --}}
<div class="modal fade" id="evaluasi-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Evaluasi Sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/manajer-marketing/evaluasi-kinerja-sales/store') }}" method="POST">
                @csrf
                    <div class="d-flex justify-content-center">
                        <p>
                            Apakah Sales yang bersangkutan telah memenuhi target bulan ini
                            (@php echo date('F Y') @endphp)?
                        </p>
                    </div>
                    @php
                        if($jabatan == "Sales A"){
                            $id = $data->ID_SALES_A;
                        }
                        else{
                            $id = $data->ID_SALES_B;
                        }
                    @endphp
                    <input type="hidden" value="{{$jabatan}}" name="jabatan">
                    <input type="hidden" value="{{$id}}" name="id_sales">
                    <input type="hidden" value="" name="evaluasi" id="evaluasi">

                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-sm btn-danger tidak">
                            <i class="fas fa-times-circle mr-2"></i>
                            TIDAK
                        </button>
                        <button class="btn btn-sm btn-success ml-2 ya">
                            <i class="fas fa-check-circle mr-2"></i>
                            YA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Evaluasi Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-detail-sales.js') }}"></script>
@endsection