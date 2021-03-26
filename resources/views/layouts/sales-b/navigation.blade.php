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
                <a href="{{ url('/sales-b') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/sales-b/customer') }}" id="customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/sales-b/order-barang') }}" id="order-barang-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <span>Order Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/sales-b/follow-up-customer') }}" id="follow-up-customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </span>
                    <span>Follow Up Customer</span>
                </a>
            </li>
        </ul>
    </div>
</div>