@extends('layouts/owner/main')
@section('title', 'Dashboard')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-dashboard.css') }}">  
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <div class="d-flex">
            <h4>Dashboard</h4>
            <h6 class="card-title">
                <i class="far fa-calendar-alt mr-2"></i>
                @php
                    echo date("d/m/Y");
                @endphp
            </h6>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card card-1">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="fas fa-bell mr-2"></i>
                        Notifikasi
                    </h6>
                    <div class="dashboard-notifikasi">
                        <h6>
                            <i class="fas fa-circle mr-2 text-google"></i>
                            {{ $data_transaksi[0] }} Transaksi supplier belum dibayar
                        </h6>
                        <h6>
                            <i class="fas fa-circle mr-2 text-google"></i>
                            {{ $data_transaksi[1] }} Pembayaran customer belum dikonfirmasi
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card card-1">
                <div class="card-body">
                    <h6 class="card-title">
                        Jumlah Pemasukan
                    </h6>
                    <h6 class="card-subtitle">
                        Pemasukan dari transaksi customer terhitung sejak awal bulan hingga saat ini
                    </h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="ti-money"></i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3">IDR {{ number_format(floatval($pemasukan->sum('TOTAL_PENJUALAN')-$pemasukan->sum('ONGKOS_KIRIM')),'0',',','.') }}</div>
                    </div>
                </div>
            </div>

            <div class="card card-1">
                <div class="card-body">
                    <h6 class="card-title">
                        Jumlah Pengeluaran
                    </h6>
                    <h6 class="card-subtitle">
                        Pengeluaran dari transaksi supplier terhitung sejak awal bulan hingga saat ini
                    </h6>
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <div class="avatar">
                                <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                    <i class="ti-money"></i>
                                </span>
                            </div>
                        </div>
                        <div class="font-weight-bold ml-1 font-size-30 ml-3">IDR {{ number_format($pengeluaran),'0',',','.' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Statistik Penjualan Tahun @php echo date("Y"); @endphp
                    </h5>

                    <h6 class="card-subtitle">
                        Data diperoleh dari akumulasi total penjualan seluruh produk
                    </h6>

                    <div class="table-responsive">
                        <div id="chart-penjualan-keseluruhan-tahunan"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/owner-dashboard.js') }}"></script>
    <script src="{{ asset('/assets/js/google-chart-loader.js') }}"></script>

    <script>
        var data_penjualan_keseluruhan = <?= json_encode($data_penjualan_keseluruhan); ?>;

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(perkembanganPenjualan);

        // function - perkembangan penjualan keseluruhan produk sepanjang tahun
        function perkembanganPenjualan() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', '');
            data.addColumn('number', 'Produk Terjual (pcs)');

            var beforedata=[];
            
            for (var i = 1; i <= 12; i++) {
                var row= [];
                row.push(data_penjualan_keseluruhan[i]["bulan"]);
                row.push(Number(data_penjualan_keseluruhan[i][0].JUMLAH_PCS));
                beforedata.push(row);
            }

            var data = new google.visualization.DataTable();
            data.addColumn('string', '');
            data.addColumn('number', 'Produk Terjual (pcs)');
            data.addRows(beforedata);

            var options = {
                width: 900,
                height: 500
            };

            var chart_div = document.getElementById('chart-penjualan-keseluruhan-tahunan');
            var chart = new google.charts.Line(chart_div);
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
    </script>
@endsection