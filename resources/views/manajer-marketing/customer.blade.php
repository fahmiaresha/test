@extends('layouts/manajer-marketing/main')
@section('title', 'Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
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
                <h5 class="">Daftar Customer</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-customer" data-toggle="modal" data-target="#modal-tambah-customer">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="customer-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->KODE_DEPO}}</td>
                        <td>{{$d->NAMA_DEPO}}</td>
                        <td>{{$d->ALAMAT_DEPO}}, {{ $d->indonesia_city->name }}</td>
                        <td colspan="2">
                            <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-customer-{{$d->KODE_DEPO}}">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-warning tombol-edit-customer" data-toggle="modal" data-target="#modal-edit-customer-{{$d->KODE_DEPO}}" id="edit-customer-{{$d->KODE_DEPO}}">
                                <i class="fas fa-edit mr-1"></i>
                                EDIT
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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
                        <h5>Alamat</h5>
                        <h6>{{$d->ALAMAT_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>{{ $d->indonesia_city->name }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>{{ $d->indonesia_city->indonesia_province->name }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Contact Person</h5>
                        <h6>{{ $d->NAMA_CUSTOMER }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Telepon</h5>
                        <h6>
                            @if($d->NO_TELP_DEPO != null)
                            {{$d->NO_TELP_DEPO}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Email</h5>
                        <h6>
                            @if($d->EMAIL_DEPO != null)
                            {{$d->EMAIL_DEPO}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Customer Modal --}}
{{-- Start Edit Customer Modal --}}
<div class="modal fade" id="modal-edit-customer-{{$d->KODE_DEPO}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/manajer-marketing/customer/edit')}}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Hidden id customer untuk update data --}}
                    <input type="hidden" name="kode_depo" value="{{$d->KODE_DEPO}}">

                    <div class="form-group">
                        <label class="col-form-label">
                            Nama Customer/Depo
                        </label>
                        <input type="text" name="nama_depo" id="" class="form-control @error('nama_depo') is-invalid @enderror" value="{{$d->NAMA_DEPO}}" required>
                        <div class="invalid-feedback">
                            Mohon isi nama depo dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="alamat_depo" id="" class="form-control @error('alamat_depo') is-invalid @enderror" value="{{$d->ALAMAT_DEPO}}" required>
                        <div class="invalid-feedback">
                            Mohon isi alamat dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component edit-provinsi @error('provinsi') is-invalid @enderror" id="edit-provinsi-{{$d->KODE_DEPO}}" name="provinsi" required>
                            <option>Pilih Provinsi . .</option>
                            @foreach($provinsi as $p)
                                @if($d->indonesia_city->indonesia_province->id)
                                <option value="{{ $d->indonesia_city->indonesia_province->id }}" selected>{{$d->indonesia_city->indonesia_province->name}}</option>
                                @else
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon isi provinsi dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component edit-kota @error('kota') is-invalid @enderror" id="edit-kota-{{$d->KODE_DEPO}}" name="kota" required>
                            <option>Pilih Provinsi . .</option>
                        </select>
                        <div class="invalid-feedback">
                            Mohon isi kota dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">
                            Contact Person
                        </label>
                        <input type="text" name="nama_customer" id="" value="{{$d->NAMA_CUSTOMER}}" class="form-control @error('nama_customer') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                            Mohon isi nama customer dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="text" name="no_telp_depo" data-input-mask="phone" value="{{$d->NO_TELP_DEPO}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" name="email_depo" value="{{$d->EMAIL_DEPO}}" id="" class="form-control">
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
{{-- End of Edit Customer Modal --}}
@endforeach
{{-- Start Input Customer Modal --}}
<div class="modal fade" id="modal-tambah-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Tambah Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/manajer-marketing/customer/insert')}}" method="POST" class="needs-validation" novalidate id="insert-form-customer">
                    @csrf

                    {{-- Hidden id sales yang menginput data --}}
                    @php $data = Auth::user()->manajer_marketing(Auth::user()->ID_USER); @endphp
                    <input type="hidden" name="id_manajer_marketing" value="{{$data->ID_MANAJER_MARKETING}}">

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Customer/Depo
                        </label>
                        <input type="text" name="nama_depo" id="" class="form-control @error('nama_depo') is-invalid @enderror" required value="{{ @old('nama_depo') }}">
                        <div class="invalid-feedback">
                            Mohon isi nama depo dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="alamat_depo" id="" class="form-control @error('alamat_depo') is-invalid @enderror"required value="{{ @old('alamat_depo') }}">
                        <div class="invalid-feedback">
                            Mohon isi alamat dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component select-provinsi @error('provinsi') is-invalid @enderror" id="" name="provinsi" required>
                            <option>Pilih provinsi . . </option>
                            @foreach ($provinsi as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Mohon isi provinsi dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component select-kota @error('kota') is-invalid @enderror" id="" name="kota" required>
                            <option>Pilih kota . . </option>
                        </select>
                        <div class="invalid-feedback">
                            Mohon isi kota dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Contact Person
                        </label>
                        <input type="text" name="nama_customer" id="" class="form-control @error('nama_customer') is-invalid @enderror" required value="{{ @old('nama_customer') }}">
                        <div class="invalid-feedback">
                            Mohon isi nama customer dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="text" name="no_telp_depo" data-input-mask="phone" class="form-control num-without-style" value="{{ @old('no_telp_depo') }}">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" name="email_depo" id="" class="form-control" value="{{ @old('email_depo') }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" onclick="document.getElementById('insert-form-customer').reset(); $('#modal-tambah-customer').modal('toggle');">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Customer Modal --}}



@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/dataTable/Sorting-1.10.20/any-number-sorting.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/input-mask/jquery.mask.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-customer.js') }}"></script>
@endsection