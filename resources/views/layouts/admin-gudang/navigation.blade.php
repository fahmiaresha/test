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
                <a href="{{ url('/admin-gudang') }}" id="dashboard-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin-gudang/penerimaan-bahan-baku') }}" id="penerimaan-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-truck-loading"></i>
                    </span>
                    <span>Penerimaan Bahan Baku</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin-gudang/pengiriman-barang') }}" id="pengiriman-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-truck"></i>
                    </span>
                    <span>Pengiriman Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin-gudang/supplier') }}" id="supplier-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-industry"></i>
                    </span>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin-gudang/customer') }}" id="customer-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>
            </li>
        </ul>
    </div>
</div>