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
                <a href="{{ url('/manajer-marketing') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/order-barang') }}" id="order-barang-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <span>Order Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/customer') }}" id="customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/sales') }}" id="sales-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Sales</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}" id="evaluasi-kinerja-sales-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-book-open"></i>
                    </span>
                    <span>Evaluasi Kinerja Sales</span>
                </a>
            </li>
        </ul>
    </div>
</div>