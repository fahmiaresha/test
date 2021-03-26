@extends('layouts/operator-mesin/main')
@section('title', 'Pengambilan Bahan Baku')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/operator-mesin.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">

    <div class="page-header">
        <h4>Pengambilan Bahan Baku</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Riwayat Pengambilan Bahan Baku</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto" data-toggle="modal" data-target="#modal-input-pengambilan-bahan-baku">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pengambilan-bahan-baku-table"
                            class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">ID Pengambilan</th>
                                <th scope="col">Waktu Pengambilan</th>
                                <th scope="col">Operator Mesin</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}</td>
                                    <td>{{$d->WAKTU_PENGAMBILAN}}</td>
                                    <td>{{$d->operator_mesin->NAMA_OPERATOR_MESIN}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal"
                                            data-target="#modal-detail-pengambilan-bahan-baku-{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}"
                                            id="detail">
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

{{-- Start Input Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-input-pengambilan-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Input Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body modal-body-pengambilan-bahan-baku">
                <form action="{{url('/operator-mesin/pengambilan-bahan-baku/insert')}}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Hidden id operator mesin yang melakukan input data --}}
                    <input type="hidden" name="id_operator_mesin" value="{{ Auth::user()->operator_mesin(Auth::user()->ID_USER)->ID_OPERATOR_MESIN }}">
                    
                    <div class="form-group">
                        <button type="button" class="btn btn-sm rounded btn-twitter tambah-bahan-baku-btn">
                            <i class="fas fa-plus mr-2"></i>
                            BAHAN BAKU
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Barang Produksi</label>
                        <select class="form-control select-component" id="" name="product" required>
                            <option selected disabled>Pilih barang yang akan diproduksi . . </option>
                            @foreach($product as $p)
                            <option value="{{$p->kode_product}}">{{$p->nama_product}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih barang yang akan diproduksi.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin yang digunakan</label>
                        <select class="form-control select-component" id="" name="mesin" required>
                            <option selected disabled>Pilih mesin . . </option>
                            @foreach($mesin as $m)
                            <option value="{{$m->KODE_MESIN}}">{{$m->NAMA_MESIN}} Moulding {{$m->moulding->NAMA_MOULDING}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih mesin.
                        </div>
                    </div>

                    <hr>
                    
                    <div class="form-group">
                        <label class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component kode-bahan-baku" id="bahan-baku0" name="bahan_baku[]" required>
                            <option selected disabled>Pilih bahan baku . . </option>
                            @foreach($bahan_baku as $b)
                            <option value="{{$b->KODE_BAHAN_BAKU}}">{{$b->NAMA_BAHAN_BAKU}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih bahan baku.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Supplier Bahan Baku</label>
                        <select class="form-control select-component id-supplier" id="nama-supplier0" name="supplier[]" required>
                            <option selected disabled>Pilih supplier . . </option>
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih supplier bahan baku.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Jumlah Bahan Baku (Kg)</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="stok0">
                                    Stok saat ini: -
                                </div>
                            </div>
                            <input type="number" name="jumlah_bahan_baku[]" id="total_kg0" class="form-control" required>
                            <div class="invalid-feedback">
                                Mohon isi jumlah bahan baku dengan benar.
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Jumlah Bahan Baku (Karung)</label>
                        <input type="number" name="jumlah_karung_sak[]" id="total_sak0" class="form-control" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah bahan baku dengan benar.
                        </div>
                    </div>
                    
                    <div class="modal-footer" id="footer-input">
                        <button type="button" class="btn btn-sm btn-google" data-dismiss="modal">BATAL</button>
                        <input type="submit" class="btn btn-sm btn-linkedin" value="SIMPAN">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Pengambilan Bahan Baku Modal --}}

@foreach($data as $d)
{{-- Start Detail Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-detail-pengambilan-bahan-baku-{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body detail-pengambilan-bahan-baku">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengambilan</h5>
                        <h6>{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Waktu Pengambilan</h5>
                        <h6>{{$d->WAKTU_PENGAMBILAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Operator Mesin</h5>
                        <h6>{{$d->operator_mesin->NAMA_OPERATOR_MESIN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Barang yang diproduksi</h5>
                        <h6>{{$d->HASIL_PRODUK}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Mesin</h5>
                        <h6>{{$d->mesin->NAMA_MESIN}}</h6>
                    </div>

                    @foreach($d->detail_pengambilans as $dt)
                    <div class="my-3">
                        <h5>Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->JUMLAH_KG}}</h6>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengambilan Bahan Baku Modal --}}
@endforeach
@endsection
@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/jquery/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-pengambilan-bahan-baku.js') }}"></script>
@endsection