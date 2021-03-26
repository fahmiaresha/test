<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Penjualan | Kemiri Water Solution</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/nota-penjualan.css') }}">

</head>
<body>

    <table class="header-container">
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
        <h6 class="">NOTA PENJUALAN</h6>
        <h6 class="nomor-surat">No. {{$no_surat}}</h6>
    </div>

    <table class="detail-customer">
        <tr>
            <td>Tanggal</td>
            <td>&nbsp; : {{date("Y-m-d",strtotime($data->pembayaran_penjualans->TGL_PEMBAYARAN))}}</td>
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

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga/pcs (IDR)</th>
                <th scope="col">Jumlah (pcs)</th>
                <!-- <th scope="col">Diskon (%)</th> -->
                <th scope="col">Total Harga (IDR)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->detil_penjualans as $d)
            <tr>
                <td>{{$d->KODE_PRODUCT}}</td>
                <td>{{$d->product->NAMA_PRODUCT}}</td>
                <td>{{ number_format($d->HARGA_BARANG,'0',',','.') }}</td>
                <td>{{$d->JUMLAH_PCS}}</td>
                <td>{{ number_format(floatval($d->JUMLAH_PCS * $d->HARGA_BARANG),'0',',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="detail-extra lighter-text">
        <tr>
            <td class="lighter-text">Metode Kirim</td>
            <td>&nbsp; : {{$data->METODE_KIRIM}}</td>
        </tr>
        <tr>
            <td class="lighter-text">Jumlah Item (pcs)</td>
            <td>&nbsp; : {{$data->detil_penjualans->sum('JUMLAH_PCS')}}</td>
        </tr>
        <tr>
            <td class="lighter-text">Jumlah Sak</td>
            <td>&nbsp; : {{$data->detil_penjualans->sum('JUMLAH_SAK')}}</td>
        </tr>
        <tr>
            <td class="lighter-text">Total Harga Produk (IDR)</td>
            <td>&nbsp; : {{ number_format(floatval($data->TOTAL_PENJUALAN - $data->ONGKOS_KIRIM),'0',',','.') }}</td>
        </tr>
        <tr>
            <td class="lighter-text">Ongkos Kirim (IDR)</td>
            <td>&nbsp; : {{$data->ONGKOS_KIRIM}}</td>
        </tr>
        <tr>
            <td class="lighter-text">Total Bayar (IDR)</td>
            <td>&nbsp; : {{ number_format($data->TOTAL_PENJUALAN,'0',',','.') }}</td>
        </tr>
    </table>

    <table class="ttd-container">
        <tr>
            <td></td>
            <td>Hormat kami,</td>
        </tr>
        <tr>
            <td>Pelanggan,</td>
            <td>Kemiri Water Solution</td>
        </tr>
        <tr>
            <td></td>
            <td class="staf-title">Staf</td>
        </tr>

        @for ($i = 0; $i < 30; $i++)        
        <tr><td colspan="2"></td></tr>
        @endfor

        <tr>
            <td>.......................</td>
            @if ($data->ID_MANAJER_MARKETING != null || $data->ID_MANAJER_MARKETING != '')
                <td>{{$data->manajer_marketing->NAMA_MANAJER_MARKETING}}</td>
            @else
                <td>{{$data->sales_b->NAMA_SALES_B}}</td>
            @endif
        </tr>
    </table>

</body>
</html>
