@extends('layouts/owner/main')
@section('title', 'Tambah Pegawai')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick-theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Tambah Pegawai</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-5 col-sm-12 form-tambah-sales-col">

            <form action="{{url('/owner/pegawai/store')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
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
                    <input type="text" value="{{ old('NAMA') }}" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required>
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required>
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>

                    
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control @error('KODE_JABATAN') is-invalid @enderror" name="KODE_JABATAN" required>
                        <option value="{{ old('KODE_JABATAN') }}" selected disabled>Pilih jabatan...</option>
                        <option value="2">Admin Gudang</option>
                        <option value="3">Manajer Marketing</option>
                        <option value="6">Operator Mesin</option>
                        <option value="4">Sales A</option>
                        <option value="5">Sales B</option>
                    </select>
                    <div class="invalid-feedback">
                        Silahkan pilih jabatan pegawai.
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" value="{{ old('ALAMAT') }}" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8">
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select-component select-provinsi @error('PROVINSI') is-invalid @enderror" name="PROVINSI" required>
                        <option value="{{ old('PROVINSI') }}" disabled>Pilih provinsi . . </option>
                        @foreach ($provinsi as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Mohon pilih kota provinsi pegawai.
                    </div>
                </div>

                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select class="form-control select-component select-kota @error('KODE_KOTA') is-invalid @enderror" name="KODE_KOTA" required>
                        <option value="{{ old('KODE_KOTA') }}" disabled>Pilih kota . . </option>
                    </select>
                    <div class="invalid-feedback">
                        Mohon pilih kota alamat pegawai.
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" value="{{ old('NO_TELP') }}" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP">
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{ old('EMAIL') }}" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" value="{{ old('USERNAME_USER') }}" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control input_password @error('PASSWORD_USER') is-invalid @enderror" name="PASSWORD_USER" required>
                    <div class="invalid-feedback">
                        Mohon isi password dengan minimal 8 karakter.
                    </div>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control input_konfirmasi_password" name="KONFIRMASI_PASSWORD" required>
                    <span id='pesan_konfirmasi_password'></span>
                </div>

                <div class="form-group form-check my-3 ml-1">
                    <input type="checkbox" class="form-check-input mt-1" id="togglePassword">
                    <label class="form-check-label" for="togglePassword">Tampilkan Password</label>
                </div>

                <div class="d-flex justify-content-center mt-5">
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
    <script src="{{ asset('/assets/js/owner-tambah-pegawai.js') }}"></script>
@endsection