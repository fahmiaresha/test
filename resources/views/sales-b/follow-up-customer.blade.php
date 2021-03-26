@extends('layouts/sales-b/main')
@section('title', 'Follow Up Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-b.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Follow Up Customer</h4>
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
                        <table class="table table-bordered datatable-component table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">ID Konfirmasi Penjualan</th>
                                <th scope="col">ID Customer</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Follow Up Order</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->ID_KONFIRMASI_PENJUALAN}}</td>
                                    <td id="kodedepo-{{$d->ID_KONFIRMASI_PENJUALAN}}">{{$d->KODE_DEPO}}</td>
                                    <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                    <td>
                                        @if($d->STATUS_KONFIRMASI_PENJUALAN == 0)
                                        <div class="btn btn-sm">
                                            BELUM KONFIRMASI
                                        </div>
                                        @elseif($d->STATUS_KONFIRMASI_PENJUALAN == 1 && $d->CATATAN == NULL)
                                        <div class="btn btn-sm">
                                            ORDER
                                            <i class="fas fa-check ml-2"></i>
                                        </div>
                                        @else
                                        <div class="btn btn-sm">
                                            TIDAK ORDER
                                            <i class="fas fa-times ml-2"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td colspan="2" id="aksi-{{$d->ID_KONFIRMASI_PENJUALAN}}">
                                        @if($d->STATUS_KONFIRMASI_PENJUALAN == 0)
                                        <button class="btn btn-sm btn-success btn-order my-2"
                                            id="{{$d->ID_KONFIRMASI_PENJUALAN}}">
                                            ORDER
                                        </button>
                                        <button class="btn btn-sm btn-google my-2" data-toggle="modal"
                                            data-target="#modal-follow-up-{{$d->ID_KONFIRMASI_PENJUALAN}}">
                                            TIDAK ORDER
                                        </button>
                                        @elseif($d->STATUS_KONFIRMASI_PENJUALAN == 1 && $d->CATATAN == NULL)
                                        <form action="{{ url('/sales-b/order-barang/input') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="KODE_DEPO" value="{{$d->KODE_DEPO}}">
                                            <button type="submit" class="btn btn-sm bg-dribbble">
                                                <i class="fas fa-plus-circle mr-2"></i>
                                                INPUT
                                            </button>
                                        </form>
                                        @elseif($d->STATUS_KONFIRMASI_PENJUALAN == 1)
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal"
                                            data-target="#modal-detail-pembatalan-order-{{$d->ID_KONFIRMASI_PENJUALAN}}">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </button>
                                        @endif
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
{{-- Start Detail Pembatalan Order Modal --}}
<div class="modal fade" id="modal-detail-pembatalan-order-{{$d->ID_KONFIRMASI_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>Alasan</h5>
                        <p>
                            {{$d->CATATAN}}
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pembatalan Order Modal --}}

{{-- Start Follow Up Modal --}}
<div class="modal fade" id="modal-follow-up-{{$d->ID_KONFIRMASI_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="" class="alasan" id="formalasan-{{$d->ID_KONFIRMASI_PENJUALAN}}">
                    @csrf
                    <div class="form-group">
                        <label>Alasan Memilih Tidak Melakukan Order?</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-1" value="Tidak/belum membutuhkan" checked>
                            <label class="form-check-label" for="alasan-1">
                                Tidak/belum membutuhkan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-2" value="Sudah memesan di tempat lain">
                            <label class="form-check-label" for="alasan-2">
                                Sudah memesan di tempat lain
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-3" value="Kualitas meragukan">
                            <label class="form-check-label" for="alasan-3">
                                Kualitas meragukan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-4" value="Lainnya">
                            <label class="form-check-label" for="alasan-4">
                                Lainnya
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-submit-alasan" id="{{$d->ID_KONFIRMASI_PENJUALAN}}">
                            SIMPAN
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- End of Follow Up Modal --}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sales-b-follow-up-customer.js') }}"></script>
    <script src="{{ asset('/assets/gogi/js/examples/sweet-alert.js') }}"></script>
@endsection