<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">MANAJEMEN PRODUCTS</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index')}}">
                <i class="fa fa-check-circle-o nav-icon"></i> Category
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index')}}">
                <i class="fa fa-server nav-icon"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('suplier.index')}}">
                <i class="fa fa-plus-circle nav-icon"></i> Supliers
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('customer.index')}}">
                <i class="fa fa-user-plus nav-icon"></i> Customers
            </a>
        </li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Manajemen Order
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('issuing.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Pembelian
                    </a>
                </li>
            </ul>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Penjualan
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="javascript">
                <i class="nav-icon icon-settings"></i> Laporan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoice.index') }}">
                        <i class="nav-icon icon-puzzle"></i> Pembelian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoice.report_purchase') }}">
                        <i class="nav-icon icon-puzzle"></i> Penjualan
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>