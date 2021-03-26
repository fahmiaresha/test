@extends('layouts/sales-a/main')
@section('title', 'Edit Profil')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick-theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/edit-profil.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content">

    <div class="page-header">
        <h4>Edit Profil</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-5 col-sm-12 form-tambah-sales-col">

        @php $data = Auth::user()->sales_a(Auth::user()->ID_USER); @endphp
            <form action="{{ url('/sales-a/edit-profil') }}" method="post" class="needs-validation" novalidate>
                @csrf

                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="4">

                    <label>Pilih Avatar</label>

                    <div class="select-avatar-show my-3">
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-3.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-4.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-5.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-6.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-7.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-8.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-9.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-10.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-11.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-12.png') }}">
                    </div>

                    <div class="select-avatar-nav my-3">
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-3.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-4.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-5.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-6.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-7.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-8.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-9.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-10.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-11.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-12.png') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama" value="{{ $data->NAMA_SALES_A }}">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" onclick="return false;" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_SALES_A == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror"  onclick="return false;" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_SALES_A == 0) checked @endif >
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Sales A" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_SALES_A }}" >
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                @php 
                $kota = \App\Models\SalesA::find($data->ID_SALES_A);
                $kota = $kota->indonesia_city;
                $pilihan_kota = \App\Models\IndonesiaCity::where('province_id',$kota->province_id)->pluck('name', 'id');
                @endphp

                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select-component select-provinsi @error('PROVINSI') is-invalid @enderror" name="PROVINSI" required>
                        <option disabled>Pilih provinsi . . </option>
                        @foreach ($provinsi as $id => $name)
                            <option value="{{ $id }}" @if($kota->province_id == $id) selected @endif >{{ $name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Mohon pilih kota provinsi pegawai.
                    </div>
                </div>

                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select class="form-control select-component select-kota @error('KODE_KOTA') is-invalid @enderror" name="KODE_KOTA" required>
                        <option disabled>Pilih kota . . </option>
                        @foreach ($pilihan_kota as $id => $name)
                            <option value="{{ $id }}" @if($data->KODE_KOTA == $id) selected @endif >{{ $name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Mohon pilih kota alamat pegawai.
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_SALES_A }}" required>
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL" value="{{ $data->EMAIL_SALES_A }}">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ Auth::user()->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ url()->previous() }}" class="btn btn-google mr-2">
                        BATAL
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        SIMPAN
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/input-mask/jquery.mask.js') }}"></script>
    <script src="{{ asset('/assets/js/edit-profil.js') }}"></script>
@endsection