@extends('layouts/operator-mesin/main')
@section('title', 'Pencatatan Hasil Produksi')
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
        <h4>Pencatatan Hasil Produksi</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Riwayat Produksi</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pengambilan-bahan-baku-table"
                            class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">KODE PRODUKSI</th>
                                <th scope="col">Tanggal Produksi</th>
                                <th scope="col">Operator Mesin</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->KODE_PRODUKSI}}</td>
                                    <td>{{date('d/m/Y - H:i:s',strtotime($d->pengambilan_bahan_baku->WAKTU_PENGAMBILAN))}}</td>
                                    <td>{{$d->pengambilan_bahan_baku->operator_mesin->NAMA_OPERATOR_MESIN}}</td>
                                    <td colspan="3">
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal"
                                            data-target="#modal-detail-produksi-{{$d->KODE_PRODUKSI}}">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </button>
                                        @if($d->EVALUASI_BAHAN_BAKU == null && $d->EVALUASI_PRODUKSI == null &&
                                        $d->EVALUASI_MESIN == null)
                                        <button class="btn btn-sm btn-dribbble" data-toggle="modal"
                                            data-target="#modal-pencatatan-produksi-{{$d->KODE_PRODUKSI}}">
                                            <i class="fas fa-book-open mr-2"></i>
                                            PENCATATAN
                                        </button>
                                        @endif
                                        @if($d->EVALUASI_BAHAN_BAKU != null)
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modal-edit-pencatatan-produksi-{{$d->KODE_PRODUKSI}}">
                                            <i class="fas fa-edit"></i>
                                            EDIT
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
{{-- Start Pencatatan Produksi Modal --}}
<div class="modal fade" id="modal-pencatatan-produksi-{{$d->KODE_PRODUKSI}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Pencatatan Produksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/operator-mesin/evaluasi-hasil-produksi/store')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="KODE_PRODUKSI" id="" value="{{$d->KODE_PRODUKSI}}">

                    <div class="form-group">
                        <label>Kode Produksi</label>
                        <input type="text" name="" id="" value="{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Produksi</label>
                        <input type="text" value="{{date('d/m/Y - H:i:s',strtotime($d->pengambilan_bahan_baku->WAKTU_PENGAMBILAN))}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang Yang Produksi</label>
                        <input type="text" name="" id="" value="{{$d->hasil_product->product->NAMA_PRODUCT}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" name="" id="" value="{{$d->pengambilan_bahan_baku->mesin->NAMA_MESIN}}" class="form-control" readonly>
                    </div>

                    @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $b)
                    <div class="form-group">
                        <label>Bahan Baku {{$loop->iteration}}</label>
                        <input type="text" value="{{$b->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Supplier Bahan Baku {{$loop->iteration}}</label>
                        <input type="text" value="{{$b->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}" class="form-control" readonly>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label>Jumlah Produk Hasil Bagus (Kg)</label>
                        <input type="number" name="HASIL_BAGUS_KG" min="1" class="form-control @error('HASIL_BAGUS_KG') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah hasil bagus dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Produk Hasil Rusak (Kg)</label>
                        <input type="number" name="HASIL_RUSAK_KG" min="0" class="form-control @error('HASIL_RUSAK_KG') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah hasil rusak dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Evaluasi Produk Hasil</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-jelek"
                                value="jelek" required>
                            <label class="form-check-label" for="eval-produk-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-sedang"
                                value="sedang" required>
                            <label class="form-check-label" for="eval-produk-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-bagus"
                                value="bagus" required>
                            <label class="form-check-label" for="eval-produk-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Evaluasi Mesin</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-jelek"
                                value="jelek" required>
                            <label class="form-check-label" for="eval-mesin-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-sedang"
                                value="sedang" required>
                            <label class="form-check-label" for="eval-mesin-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-bagus"
                                value="bagus" required>
                            <label class="form-check-label" for="eval-mesin-bagus">Bagus</label>
                        </div>
                    </div>

                    @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $b)
                    

                    <div class="form-group">
                        <label>Evaluasi Bahan Baku {{$loop->iteration}} ({{$b->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}})</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-jelek-{{$loop->iteration}}"
                                value="jelek" required>
                            <label class="form-check-label" for="eval-bahan-baku-jelek-{{$loop->iteration}}">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-sedang-{{$loop->iteration}}"
                                value="sedang" required>
                            <label class="form-check-label" for="eval-bahan-baku-sedang-{{$loop->iteration}}">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-bagus-{{$loop->iteration}}"
                                value="bagus" required>
                            <label class="form-check-label" for="eval-bahan-baku-bagus-{{$loop->iteration}}">Bagus</label>
                        </div>
                    </div>

                    @endforeach

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Pencatatan Produksi Modall --}}

{{-- Start Detail Produksi Modal --}}
<div class="modal fade" id="modal-detail-produksi-{{$d->KODE_PRODUKSI}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Produksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>Kode Produksi</h5>
                        <h6>{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Produksi</h5>
                        <h6>{{date('d/m/Y - H:i:s',strtotime($d->pengambilan_bahan_baku->WAKTU_PENGAMBILAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Operator Mesin</h5>
                        <h6>{{$d->pengambilan_bahan_baku->operator_mesin->NAMA_OPERATOR_MESIN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Barang Yang Produksi</h5>
                        <h6>{{$d->hasil_product->product->NAMA_PRODUCT}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Mesin</h5>
                        <h6>{{$d->pengambilan_bahan_baku->mesin->NAMA_MESIN}}</h6>
                    </div>

                   

                    @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $b)
                    <div class="my-3">
                        <h5>Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$b->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$b->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}</h6>
                    </div>
                    @endforeach

                    <div class="my-3">
                        <h5>Jumlah Produk Hasil Bagus (Kg)</h5>
                        <h6>@if($d->HASIL_BAGUS_KG != "")
                            {{$d->HASIL_BAGUS_KG}}
                            @else
                            N/A
                            @endif</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Produk Hasil Rusak (Kg)</h5>
                        <h6>@if($d->HASIL_RUSAK_KG != "")
                            {{$d->HASIL_RUSAK_KG}}
                            @else
                            N/A
                            @endif</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Produk Hasil</h5>
                        <h6>
                            @if($d->EVALUASI_PRODUCT != "")
                            {{ucwords($d->EVALUASI_PRODUCT)}}
                            @else
                            N/A
                            @endif</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Mesin</h5>
                        <h6>@if($d->EVALUASI_MESIN != "")
                            {{ucwords($d->EVALUASI_MESIN)}}
                            @else
                            N/A
                            @endif</h6>
                    </div>

                    @if($d->EVALUASI_BAHAN_BAKU != "")

                    @php 
                    $evaluasi = $d->EVALUASI_BAHAN_BAKU;

                    $d->EVALUASI_BAHAN_BAKU = str_replace("[","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = str_replace("]","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = str_replace(" ","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = str_replace('"',"",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = explode(",",$d->EVALUASI_BAHAN_BAKU);
                    @endphp
                        @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $e)
                        <div class="my-3">
                            <h5>Evaluasi Bahan Baku {{$loop->iteration}}</h5>
                            <h6>{{ucwords($d->EVALUASI_BAHAN_BAKU[$loop->index])}}</h6>
                        </div>
                        @endforeach
                    @else
                        <div class="my-3">
                            <h5>Evaluasi Bahan Baku</h5>
                            <h6>N/A</h6>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Produksi Modal --}}

@if($d->HASIL_BAGUS_KG != null)
@php $d->EVALUASI_BAHAN_BAKU = $evaluasi; @endphp
{{-- Start Edit Pencatatan Produksi Modal --}}
<div class="modal fade" id="modal-edit-pencatatan-produksi-{{$d->KODE_PRODUKSI}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Pencatatan Produksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/operator-mesin/evaluasi-hasil-produksi/update')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="KODE_PRODUKSI" id="" value="{{$d->KODE_PRODUKSI}}">

                    <div class="form-group">
                        <label>Kode Produksi</label>
                        <input type="text" name="" id="" value="{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Produksi</label>
                        <input type="text" value="{{date('d/m/Y - H:i:s',strtotime($d->pengambilan_bahan_baku->WAKTU_PENGAMBILAN))}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang Yang Produksi</label>
                        <input type="text" name="" id="" value="{{$d->hasil_product->product->NAMA_PRODUCT}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Mesin</label>
                        <input type="text" name="" id="" value="{{$d->pengambilan_bahan_baku->mesin->NAMA_MESIN}}" class="form-control" readonly>
                    </div>

                    @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $b)
                    <div class="form-group">
                        <label>Bahan Baku {{$loop->iteration}}</label>
                        <input type="text" value="{{$b->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Supplier Bahan Baku {{$loop->iteration}}</label>
                        <input type="text" value="{{$b->penerimaan_bahan_baku->supplier->NAMA_SUPPLIER}}" class="form-control" readonly>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label>Jumlah Produk Hasil Bagus (Kg)</label>
                        <input type="number" name="HASIL_BAGUS_KG" min="1" class="form-control @error('HASIL_BAGUS_KG') is-invalid @enderror" required value="{{ $d->HASIL_BAGUS_KG }}">
                        <div class="invalid-feedback">
                            Mohon isi jumlah hasil bagus dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Produk Hasil Rusak (Kg)</label>
                        <input type="number" name="HASIL_RUSAK_KG" min="0" class="form-control @error('HASIL_RUSAK_KG') is-invalid @enderror" required value="{{ $d->HASIL_RUSAK_KG }}">
                        <div class="invalid-feedback">
                            Mohon isi jumlah hasil rusak dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Evaluasi Produk Hasil</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-jelek"
                                value="jelek" required @if($d->EVALUASI_PRODUCT == "jelek") checked @endif>
                            <label class="form-check-label" for="eval-produk-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-sedang"
                                value="sedang" required @if($d->EVALUASI_PRODUCT == "sedang") checked @endif>
                            <label class="form-check-label" for="eval-produk-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_PRODUCT" id="eval-produk-bagus"
                                value="bagus" required @if($d->EVALUASI_PRODUCT == "bagus") checked @endif>
                            <label class="form-check-label" for="eval-produk-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Evaluasi Mesin</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-jelek"
                                value="jelek" required @if($d->EVALUASI_MESIN == "jelek") checked @endif>
                            <label class="form-check-label" for="eval-mesin-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-sedang"
                                value="sedang" required @if($d->EVALUASI_MESIN == "sedang") checked @endif>
                            <label class="form-check-label" for="eval-mesin-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_MESIN" id="eval-mesin-bagus"
                                value="bagus" required @if($d->EVALUASI_MESIN == "bagus") checked @endif>
                            <label class="form-check-label" for="eval-mesin-bagus">Bagus</label>
                        </div>
                    </div>

                    @php $d->EVALUASI_BAHAN_BAKU = str_replace("[","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = str_replace("]","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = str_replace(" ","",$d->EVALUASI_BAHAN_BAKU);
                    $d->EVALUASI_BAHAN_BAKU = explode(",",$d->EVALUASI_BAHAN_BAKU); @endphp

                    @foreach($d->pengambilan_bahan_baku->detail_pengambilans as $b)

                    <div class="form-group">
                        <label>Evaluasi Bahan Baku {{$loop->iteration}} ({{$b->penerimaan_bahan_baku->bahan_baku->NAMA_BAHAN_BAKU}})</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-jelek-{{$loop->iteration}}"
                                value="jelek" required @if($d->EVALUASI_BAHAN_BAKU[$loop->index] == '"jelek"') checked @endif>
                            <label class="form-check-label" for="eval-bahan-baku-jelek-{{$loop->iteration}}">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-sedang-{{$loop->iteration}}"
                                value="sedang" required @if($d->EVALUASI_BAHAN_BAKU[$loop->index] == '"sedang"') checked @endif>
                            <label class="form-check-label" for="eval-bahan-baku-sedang-{{$loop->iteration}}">Sedang</label>
                        </div>
                        @if($d->EVALUASI_BAHAN_BAKU[$loop->index] == "bagus") hasilnya bagus @endif
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="EVALUASI_BAHAN_BAKU_{{$loop->iteration}}" id="eval-bahan-baku-bagus-{{$loop->iteration}}"
                                value="bagus" required @if($d->EVALUASI_BAHAN_BAKU[$loop->index] == '"bagus"') checked @endif>
                            <label class="form-check-label" for="eval-bahan-baku-bagus-{{$loop->iteration}}">Bagus</label>
                        </div>
                    </div>

                    @endforeach

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Pencatatan Produksi Modall --}}
@endif

@endforeach

@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-pencatatan-produksi.js') }}"></script>
@endsection