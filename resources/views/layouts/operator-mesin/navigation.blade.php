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
                <a href="{{ url('/operator-mesin') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/operator-mesin/pengambilan-bahan-baku') }}" id="pengambilan-bahan-baku-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-cubes"></i>
                    </span>
                    <span>Pengambilan Bahan Baku</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/operator-mesin/evaluasi-hasil-produksi') }}" id="pencatatan-produksi-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-paste"></i>
                    </span>
                    <span>Pencatatan Hasil Produksi</span>
                </a>
            </li>
        </ul>
    </div>
</div>