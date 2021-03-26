<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a href="{{ url('/owner') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/owner/pembayaran-supplier') }}" id="pembayaran-supplier-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <span>Pembayaran ke Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/owner/pembayaran-customer') }}" id="pembayaran-customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <span>Pembayaran Customer</span>
                </a>
            </li>
            <li>
                <a href="#" id="pegawai-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Pegawai</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/admin-gudang') }}" id="admin-gudang-menu">Admin Gudang</a>
                    </li>

                    <li>
                        <a href="{{ url('/owner/manajer-marketing') }}" id="manajer-marketing-menu">Manajer Marketing</a>
                    </li>

                    <li>
                        <a href="{{ url('/owner/operator-mesin') }}" id="operator-mesin-menu">Operator Mesin</a>
                    </li>

                    <li>
                        <a href="{{ url('/owner/sales') }}" id="sales-menu" class="">Sales</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" id="laporan-menu">
                    <span class="nav-link-icon">
                        <i class="far fa-chart-bar"></i>
                    </span>
                    <span>Laporan</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/owner/laporan/transaksi-supplier') }}">Transaksi Supplier</a>
                    </li>

                    <li>
                        <a href="{{ url('/owner/laporan/transaksi-customer') }}">Transaksi Customer</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>