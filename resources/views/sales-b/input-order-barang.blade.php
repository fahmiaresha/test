@extends('layouts/sales-b/main')
@section('title', 'Input Order Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-b.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Input Order Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{-- Start form order barang --}}
            <form action="{{url('/sales-b/order-barang/store')}}" method="post" class="needs-validation" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="staff">Sales</label>
                        {{-- Id sales --}}
                        @php $data = Auth::user()->sales_b(Auth::user()->ID_USER); @endphp
                        <input type="hidden" value="{{ $data->ID_SALES_B }}" name="ID_SALES_B">
                        <input type="hidden" value="{{$customer->KODE_DEPO}}" name="KODE_DEPO">
                        <input type="text" class="form-control" readonly value="{{ $data->NAMA_SALES_B }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Customer</label>
                        <input type="text" class="form-control" readonly value="{{$customer->NAMA_DEPO}}">
                    </div>
                </div>

                <div class="form-row my-2">
                    <h5>Tambah Produk</h5>
                </div>

                <div class="form-row mt-2">
                    <div class="form-group mx-2">
                        <label for="categories">Kategori</label>
                        <select id="categories" class="form-control">
                            <option id="all" value="semua">Semua</option>
                            @foreach($jenis as $j)
                                <option value="{{$j->KODE_JENIS_PRODUCT}}">{{$j->NAMA_JENIS_PRODUCT}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mx-2">
                        <label for="product">Produk</label>
                        <select id="product" class="form-control select-component"></select>
                    </div>

                    <div class="form-group col-md-4 mt-4 ml-2">
                        <button type="button" class="btn btn-sm btn-secondary mt-2 text-white" id="add-btn">Tambah</button>
                    </div>
                </div>

                <table class="table table-hover my-4" id="keranjang">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga/pcs (IDR)</th>
                            <th scope="col">Qty (pcs)</th>
                            <th scope="col">Qty (sak)</th>
                            <th scope="col">Diskon (%)</th>
                            <th scope="col">Harga Akhir (IDR)</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <span class="text-center text-danger" id="warning-produk">Anda belum menambahkan produk.</span>

                <div class="form-group row mt-5">

                    <div class="form-group col-md-6">
                        <div class="form-group col-md-10 col-sm-12">
                            <label class="col-form-label">Metode Kirim</label>
                            <select name="METODE_KIRIM" class="form-control @error('METODE_KIRIM') is-invalid @enderror" required>
                                <option>Ambil Sendiri</option>
                                <option>Truk/Kontainer Kemiri</option>
                                <option>POS Indonesia</option>
                                <option>JNE</option>
                                <option>J&T</option>
                                <option>TIKI</option>
                            </select>
                            <div class="invalid-feedback">
                                Mohon pilih metode kirim.
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-sm-12">
                            <label class="col-form-label">Ongkos Kirim (IDR)</label>
                            <input type="number" name="ONGKOS_KIRIM" id="input-ongkos-kirim" min="0" value="0" class="form-control num-without-style @error('ONGKOS_KIRIM') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                Mohon isi ongkos kirim dengan benar.
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <h3>Pembayaran</h3>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Item (pcs)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="total-item" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Sak</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="total-sak" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Total Harga Produk (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="total-harga" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ongkos Kirim (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="ongkos-kirim" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Total Bayar (IDR)</label>
                            <div class="col-sm-4">
                                <input type="hidden" id="total-bayar-num" name="TOTAL_PENJUALAN">
                                <input type="text" readonly class="form-control-plaintext" id="total-bayar" value="0">
                            </div>
                        </div>

                    </div>
     
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-linkedin my-3" data-toggle="modal" data-target="#modal-konfirmasi">
                        SIMPAN
                    </button>
                </div>

                <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h5 class="modal-title" id="modal-form-label">Konfirmasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="container">

                                    <div class="my-3">
                                        <h5>Apakah anda yakin untuk menyimpan transaksi ini?</h5>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
            {{-- End of form order barang --}}
        </div>
    </div>
</div>
{{-- End of Content --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sales-b-input-order-barang.js') }}"></script>
    <script type="text/javascript">
        var products = <?php echo json_encode($products); ?>;
    </script>
@endsection