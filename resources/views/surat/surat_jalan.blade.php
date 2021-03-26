<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Jalan | Kemiri Water Solution</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/surat-jalan.css') }}">
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="{{ asset('/assets/img/logo-kemiri-180.png') }}" class="logo-kemiri">
            </td>
            <td class="kemiri-title">&nbsp;Kemiri Water Solution</td>
        </tr>
        <tr>
            <td colspan="2" class="lighter-text detail-perusahaan">Jl. Raya Kemiri No. 30, Sidoarjo</td>
        </tr>
        <tr>
            <td colspan="2" class="lighter-text detail-perusahaan">0878 5546 6055</td>
        </tr>
    </table>

    <hr>

    <div class="nomor-surat-container">
        <h6 class="">SURAT JALAN</h6>
        <h6 class="nomor-surat">No. {{$no_surat}}</h6>
    </div>

    <table class="detail-customer">
        <tr>
            <td>Tanggal</td>
            <td>&nbsp; : {{date("Y-m-d",strtotime($data->pembayaran_penjualans->pengirimen->TGL_KIRIM_RIIL))}}</td>
        </tr>
        <tr>
            <td>Yth</td>
            <td>&nbsp; : {{$data->depo_air_minum->NAMA_DEPO}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp; : {{$data->depo_air_minum->ALAMAT_DEPO}}, {{$data->depo_air_minum->indonesia_city->name}}, {{$data->depo_air_minum->indonesia_city->indonesia_province->name}}</td>
        </tr>
    </table>

    <p class="pendahuluan">
        Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan
        <span>{{$data->pembayaran_penjualans->pengirimen->TIPE_KENDARAAN}}</span>,
        nomor polisi
        <span>{{$data->pembayaran_penjualans->pengirimen->NOPOL}}</span>
    </p>

    <table class="table table-striped table-bordered detail-barang">
        <thead>
            <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah (pcs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->detil_penjualans as $d)
            <tr>
                <td>{{$d->KODE_PRODUCT}}</td>
                <td>{{$d->product->NAMA_PRODUCT}}</td>
                <td>{{$d->JUMLAH_PCS}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="ttd-container">
        <tr>
            <td></td>
            <td>Hormat kami,</td>
        </tr>
        <tr>
            <td>Yang menerima,</td>
            <td>Kemiri Water Solution</td>
        </tr>
        <tr>
            <td></td>
            <td class="admin-gudang-title">Admin Gudang</td>
        </tr>

        @for ($i = 0; $i < 30; $i++)        
        <tr><td colspan="2"></td></tr>
        @endfor

        <tr>
            <td>.......................</td>
            <td>{{$data->pembayaran_penjualans->pengirimen->admin_gudang->NAMA_ADMIN_GUDANG}}</td>
        </tr>
    </table>
</body>
</html>