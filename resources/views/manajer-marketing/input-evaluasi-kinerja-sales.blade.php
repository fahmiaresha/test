@extends('layouts/manajer-marketing/main')
@section('title', 'Evaluasi Kinerja Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Evaluasi Kinerja Sales</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                @if($jabatan == "Sales A")
                <form action="{{ url('/manajer-marketing/evaluasi-kinerja-sales-a/store') }}" method="post" class="needs-validation" novalidate>
                @else
                <form action="{{ url('/manajer-marketing/evaluasi-kinerja-sales-b/store') }}" method="post" class="needs-validation" novalidate>
                @endif
                    @csrf
                    @php $data = Auth::user()->manajer_marketing(Auth::user()->ID_USER); @endphp
                    <input type="hidden" name="ID_MANAJER_MARKETING" value="{{$data->ID_MANAJER_MARKETING}}">
                    @if($jabatan == "Sales A")
                    <div class="form-row">
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Tanggal Evaluasi</label>
                            <input type="text" name="TGL_EVALUASI_KINERJA_SALESA" id="" value="@php echo date('d/m/Y'); @endphp" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="col-form-label">ID Sales</label>
                            <input type="text" name="ID_SALES_A" id="" value="{{$data->ID_SALES_A}}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-5 col-sm-12">
                            <label class="col-form-label">Nama Sales</label>
                            <input type="text" value="{{$data->NAMA_SALES_A}}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Jabatan</label>
                            <input type="text" value="Sales A" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Evaluasi</label>
                            <textarea name="EVALUASI_SALESA" rows="12" id="" class="tinymce-textarea @error('EVALUASI_SALESA') is-invalid @enderror"></textarea>
                            <div class="invalid-feedback">
                                Mohon isi evaluasi dengan benar.
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-12" style="text-align: right;">
                            <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales-a/store') }}" class="btn btn-google">
                                BATAL
                            </a>
                            <button type="submit" class="btn btn-primary">
                                SIMPAN
                            </button>
                        </div>
                    </div>
                    @else      
                    <div class="form-row">
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Tanggal Evaluasi</label>
                            <input type="text" name="TGL_EVALUASI_KINERJA_SALESB" id="" value="@php echo date('d/m/Y'); @endphp" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="col-form-label">ID Sales</label>
                            <input type="text" name="ID_SALES_B" id="" value="{{$data->ID_SALES_B}}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-5 col-sm-12">
                            <label class="col-form-label">Nama Sales</label>
                            <input type="text" value="{{$data->NAMA_SALES_B}}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Jabatan</label>
                            <input type="text" value="Sales B" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Evaluasi</label>
                            <textarea name="EVALUASI_SALESB" rows="12" id="" class="tinymce-textarea @error('EVALUASI_SALESB') is-invalid @enderror"></textarea>
                            <div class="invalid-feedback">
                                Mohon isi evaluasi dengan benar
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="form-group col-12" style="text-align: right;">
                            <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}" class="btn btn-google">
                                BATAL
                            </a>
                            <button type="submit" class="btn btn-primary">
                                SIMPAN
                            </button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Content --}}
    
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/manajer-marketing-input-evaluasi-sales.js') }}"></script>
@endsection