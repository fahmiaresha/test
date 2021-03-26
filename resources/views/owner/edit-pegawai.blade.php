@extends('layouts/owner/main')
@section('title', 'Edit Pegawai')
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
        <h4>Edit Pegawai</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-5 col-sm-12 form-tambah-sales-col">

            <form action="{{url('/owner/pegawai/store')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="ID_USER" value="{{ Request::segment(3) }}">
                @if($jenis == "Admin Gudang")
                @php $data = \App\Models\User::find(Request::segment(3))->admin_gudang(Request::segment(3)); @endphp
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="2">
                    <input type="hidden" name="ID" value="{{ $data->ID_ADMIN_GUDANG }}">

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
                    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama" value="{{ $data->NAMA_ADMIN_GUDANG }}">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_ADMIN_GUDANG == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_ADMIN_GUDANG == 0) checked @endif >
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Admin Gudang" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_ADMIN_GUDANG }}">
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                @php 
                $kota = \App\Models\AdminGudang::find($data->ID_ADMIN_GUDANG);
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
                    <input type="text" placeholder="0811 2345 56789" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_ADMIN_GUDANG }}">
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL" value="{{ $data->EMAIL_ADMIN_GUDANG }}">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ $data->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>
                @elseif($jenis == "Manajer Marketing")
                @php $data = \App\Models\User::find(Request::segment(3))->manajer_marketing(Request::segment(3)); @endphp
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="3">
                    <input type="hidden" name="ID" value="{{ $data->ID_MANAJER_MARKETING }}">

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
                    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama" value="{{ $data->NAMA_MANAJER_MARKETING }}">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_MANAJER_MARKETING == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_MANAJER_MARKETING == 0) checked @endif >
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Manajer Marketing" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_MANAJER_MARKETING }}">
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                @php 
                $kota = \App\Models\ManajerMarketing::find($data->ID_MANAJER_MARKETING);
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
                    <input type="text" placeholder="0811 2345 56789" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_MANAJER_MARKETING }}">
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL" value="{{ $data->EMAIL_MANAJER_MARKETING }}">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ $data->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>
                @elseif($jenis == "Operator Mesin")
                @php $data = \App\Models\User::find(Request::segment(3))->operator_mesin(Request::segment(3)); @endphp
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="6">
                    <input type="hidden" name="ID" value="{{ $data->ID_OPERATOR_MESIN }}">

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
                    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama" value="{{ $data->NAMA_OPERATOR_MESIN }}">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_OPERATOR_MESIN == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_OPERATOR_MESIN == 0) checked @endif >
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Operator Mesin" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_OPERATOR_MESIN }}">
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                @php 
                $kota = \App\Models\OperatorMesin::find($data->ID_OPERATOR_MESIN);
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
                    <input type="text" placeholder="0811 2345 56789" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_OPERATOR_MESIN }}">
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL" value="{{ $data->EMAIL_OPERATOR_MESIN }}">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ $data->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>
                @elseif($jenis == "Sales A")
                @php $data = \App\Models\User::find(Request::segment(3))->sales_a(Request::segment(3)); @endphp
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="4">
                    <input type="hidden" name="ID" value="{{ $data->ID_SALES_A }}">

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
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_SALES_A == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_SALES_A == 0) checked @endif >
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
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_SALES_A }}">
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
                    <input type="text" placeholder="0811 2345 56789" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_SALES_A }}">
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
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ $data->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>
                @elseif($jenis == "Sales B")
                @php $data = \App\Models\User::find(Request::segment(3))->sales_b(Request::segment(3)); @endphp
                <div class="form-group mb-5">
                    <input type="hidden" name="FOTO_PROFILE" value="1" id="foto-profile" required>
                    <input type="hidden" name="KODE_JABATAN" value="5">
                    <input type="hidden" name="ID" value="{{ $data->ID_SALES_B }}">

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
                    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" name="NAMA" required id="nama" value="{{ $data->NAMA_SALES_B }}">
                    <div class="invalid-feedback">
                        Mohon isi nama dengan benar.
                    </div>
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_pria" value="1" required @if($data->JENIS_KELAMIN_SALES_B == 1) checked @endif >
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('JENIS_KELAMIN') is-invalid @enderror" type="radio" name="JENIS_KELAMIN" id="jk_wanita" value="0" required @if($data->JENIS_KELAMIN_SALES_B == 0) checked @endif >
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                        <div class="invalid-feedback">
                            Silahkan pilih jenis kelamin pegawai.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="Sales B" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" required maxlength="100" minlength="8" value="{{ $data->ALAMAT_SALES_B }}">
                    <div class="invalid-feedback">
                        Mohon isi alamat pegawai dengan benar.
                    </div>
                </div>

                @php 
                $kota = \App\Models\SalesB::find($data->ID_SALES_B);
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
                    <input type="text" placeholder="0811 2345 56789" data-input-mask="phone" min="0" class="form-control num-without-style @error('NO_TELP') is-invalid @enderror" name="NO_TELP" value="{{ $data->NO_TELP_SALES_B }}">
                    <div class="invalid-feedback">
                        Mohon isi nomor telepon pegawai dengan benar.
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" name="EMAIL" value="{{ $data->EMAIL_SALES_B }}">
                    <div class="invalid-feedback">
                        Mohon isi email yang valid.
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('USERNAME_USER') is-invalid @enderror" name="USERNAME_USER" required minlength="5" maxlength="100" value="{{ $data->username }}">
                    <div class="invalid-feedback">
                        Username harus unik dengan minimal 5 karakter.
                    </div>
                </div>
                @endif

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
    <script src="{{ asset('/assets/js/owner-edit-pegawai.js') }}"></script>
    
@endsection