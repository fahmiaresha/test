@extends('layouts/manajer-marketing/main')
@section('title', 'Dashboard')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing-dashboard.css') }}">
    <script>
        const namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November",
            "Desember"
        ];

        const waktu = new Date();
    </script>
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Statistik Penjualan Produk
                    <script>document.write(namaBulan[waktu.getMonth()] + ' ' + waktu.getFullYear());</script>
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-produk-bulanan"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Perkembangan Penjualan Produk @php echo date("Y"); @endphp
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-produk-tahunan"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Perkembangan Penjualan Produk Keseluruhan @php echo date("Y"); @endphp
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
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
    <script src="{{ asset('/assets/js/google-chart-loader.js') }}"></script>
    <script>
        var data_penjualan_bulanan = <?= json_encode($data_penjualanproduct); ?>;
        var data_penjualan_tahunan = <?= json_encode($data_penjualan); ?>;
        var data_penjualan_keseluruhan = <?= json_encode($data_penjualan_keseluruhan); ?>;
        const menu = document.getElementById("dashboard-menu");
        menu.classList.add("active");

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(penjualanProdukBulanan);
        google.charts.setOnLoadCallback(penjualanProdukTahunan);
        google.charts.setOnLoadCallback(penjualanKeseluruhanTahunan);

        // function - statistik penjualan produk per bulan
        function penjualanProdukBulanan() {

            var data=[];
            var Header= ["Element", "Produk Terjual (pcs)", { role: "style" } ];
            data.push(Header);
            for (var i = 0; i < data_penjualan_bulanan.length; i++) {
              var temp=[];
              temp.push(data_penjualan_bulanan[i].NAMA_PRODUCT);
              temp.push(Number(data_penjualan_bulanan[i].JUMLAH_PCS));
              temp.push("blue");

              data.push(temp);
            }

            var chartdata = new google.visualization.arrayToDataTable(data);

            var view = new google.visualization.DataView(chartdata);
            view.setColumns([0, 1,
                                { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                2]);

            var options = {
                width: 1000,
                height: 500,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var chart_div = document.getElementById('chart-penjualan-produk-bulanan');
            var chart = new google.visualization.ColumnChart(chart_div);
            chart.draw(view, options);
        }



        // function - chart perkembangan penjualan produk sepanjang tahun
        function penjualanProdukTahunan() {

            var beforedata=[];
            var header= [];
            header.push("Bulan");
            const lengthproduk = Number(Object.keys(data_penjualan_tahunan[1]).length)-1;
            for (var i = 0; i < lengthproduk; i++) {
                var namaproduk = data_penjualan_tahunan[1][i].NAMA_PRODUCT;
                header.push(namaproduk);
            }
            beforedata.push(header);
            
            for (var i = 1; i <= Object.keys(data_penjualan_tahunan).length; i++) {
                var temp=[];
                temp.push(data_penjualan_tahunan[i]["bulan"]);
                for (var j = 0; j < lengthproduk; j++) {
                    temp.push(Number(data_penjualan_tahunan[i][j].JUMLAH_PCS));
                }
                beforedata.push(temp);
            }

            var data = new google.visualization.arrayToDataTable(beforedata);

            var options = {
                vAxis: {
                    minValue: 0
                },
                width: 1000,
                height: 500
            };

            var chart_div = document.getElementById('chart-penjualan-produk-tahunan');
            var chart = new google.visualization.AreaChart(chart_div);
            chart.draw(data, options);
        }

        // function - perkembangan penjualan keseluruhan produk sepanjang tahun
        function penjualanKeseluruhanTahunan() {

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