@extends('layouts/admin-gudang/main')
@section('title', 'Penerimaan Bahan Baku')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">
    <div class="page-header">
        <h4>Penerimaan Bahan Baku</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Riwayat Penerimaan Bahan Baku</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-input-penerimaan" data-toggle="modal" data-target="#modal-input-penerimaan">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="penerimaan-bahan-baku-table"
                            class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Penerimaan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{ $d->ID_PENERIMAAN }}</td>
                                    <td>@php echo $d->TGL_KEDATANGAN @endphp</td>
                                    <td>{{$d->SUPPLIER}}</td>
                                    <td>
                                        <button class="btn btn-linkedin btn-sm tombol-detail-penerimaan"
                                            data-toggle="modal"
                                            data-target="#modal-detail-penerimaan-{{$d->ID_PENERIMAAN}}">
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
<!-- ./ Content -->
@foreach($data as $d)
{{-- Start Detail Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-detail-penerimaan-{{$d->ID_PENERIMAAN}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h6>{{$d->ID_PENERIMAAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>@php echo $d->TGL_KEDATANGAN @endphp</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Gudang</h5>
                        <h6>{{$d->STAFF_GUDANG}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier</h5>
                        <h6>{{$d->SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Bahan Baku</h5>
                        <h6>{{$d->nama_bahan_baku}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Karung</h5>
                        <h6>{{$d->JUMLAH_KARUNG_SAK}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat per Karung (Kg)</h5>
                        <h6>{{$d->ISI_KARUNG}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat Total (Kg)</h5>
                        <h6>{{$d->TOTAL_BERAT}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Bahan Baku Bagus (Kg)</h5>
                        <h6>120 Kg</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Bahan Baku Rusak (Kg)</h5>
                        <h6>3 Kg</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Penerimaan Bahan Baku Modal--}}
{{-- Start Edit Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-edit-penerimaan-{{$d->ID_PENERIMAAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Edit Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin-gudang/penerimaan-bahan-baku/edit')}}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Hidden id penerimaan bahan baku untuk update penerimaan --}}
                    <input type="hidden" name="id_penerimaan" id="" value="{{$d->id_penerimaan}}">

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl_kedatangan" id="" class="form-control @error('tgl_kedatangan') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi tanggal kedatangan.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control select-component" id="" name="id_supplier">
                            <option>Pilih supplier . . </option>
                            @foreach ($supplier as $s)
                                <option value="{{ $s->id_supplier }}">{{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Bahan Baku</label>
                        <select class="form-control select-component" id="" name="kode_bahan_baku">
                            <option>Pilih bahan baku . . </option>
                            @foreach ($bahanBaku as $b)
                                <option value="{{ $b->kode_bahan_baku }}">{{ $b->nama_bahan_baku }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Karung</label>
                        <input type="number" name="jumlah_karung_sak" id="karung" class="form-control edit-jumlah-karung @error('jumlah_karung_sak') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah karung dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Berat per Karung (Kg)</label>
                        <input type="number" name="isi_karung" id="isi" class="form-control edit-berat-karung @error('isi_karung') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi berat karung dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Berat Total (Kg)</label>
                        <input type="number" name="total_berat" id="total_berat" class="form-control edit-berat-total" value="" placeholder="0" readonly>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Bahan Baku Bagus (Kg)</label>
                        <input type="number" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Bahan Baku Rusak (Kg)</label>
                        <input type="number" class="form-control" min="0">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Penerimaan Bahan Baku Modal --}}
@endforeach
{{-- Start Input Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-input-penerimaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Input Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin-gudang/penerimaan-bahan-baku/insert')}}" id="form_input_penerimaan" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Hidden id admin gudang yang melakukan input data penerimaan --}}
                    @php $data = Auth::user()->admin_gudang(Auth::user()->ID_USER); @endphp
                    <input type="hidden" name="id_admin_gudang" id="" value="{{$data->ID_ADMIN_GUDANG}}">

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl_kedatangan" id="" class="form-control @error('tgl_kedatangan') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi tanggal kedatangan.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control select-component @error('id_supplier') is-invalid @enderror" id="" name="id_supplier" required>
                            <option selected value="" disabled>Pilih supplier . . </option>
                            @foreach ($supplier as $s)
                                <option value="{{ $s->id_supplier }}">{{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih supplier dengan benar.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Bahan Baku</label>
                        <select class="form-control select-component @error('kode_bahan_baku') is-invalid @enderror" id="" name="kode_bahan_baku" required>
                            <option selected value="" disabled>Pilih bahan baku . . </option>
                            @foreach ($bahanBaku as $b)
                                <option value="{{ $b->kode_bahan_baku }}">{{ $b->nama_bahan_baku }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih bahan baku dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Karung</label>
                        <input type="text" name="jumlah_karung_sak" id="in_karung" class="form-control input-jumlah-karung @error('jumlah_karung_sak') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah karung dengan benar.
                        </div> 
                    </div>

                    <div class="form-group">
                        <label>Berat per Karung (Kg)</label>
                        <input type="text" name="isi_karung" id="in_tiap_karung" class="form-control input-berat-karung @error('isi_karung') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi berat karung dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Berat Total (Kg)</label>
                        <input type="text" name="total_berat" id="in_total" class="form-control input-berat-total @error('total_berat') is-invalid @enderror" placeholder="0" required>
                        <div class="invalid-feedback">
                            Mohon isi berat karung dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Bahan Baku Bagus (Kg)</label>
                        <input type="text" class="form-control input-bagus @error('bagus') is-invalid @enderror" name="bagus" min="0" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah bahan baku bagus dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Bahan Baku Rusak (Kg)</label>
                        <input type="text" class="form-control input-rusak @error('rusak') is-invalid @enderror" min="0" name="rusak" required>
                        <div class="invalid-feedback">
                            Mohon isi jumlah bahan baku rusak dengan benar.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google batal" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Penerimaan Bahan Baku Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/custom-form-inputmask.js') }}"></script>
    <script src="{{ asset('/assets/bootstrap/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-penerimaan.js') }}"></script>
    
@endsection