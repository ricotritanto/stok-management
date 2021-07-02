<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>
        @if($role =='admin')
        <li class="nav-title">MANAJEMEN PRODUCTS</li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Master Data
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index')}}">
                        <i class="fa fa-check-circle-o nav-icon"></i> Category
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('satuan.index')}}">
                        <i class="fa fa-check-circle-o nav-icon"></i> Satuan
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-check-circle-o nav-icon"></i> Lokasi
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index')}}">
                        <i class="fa fa-server nav-icon"></i> Products
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-print nav-icon"></i> Barcode
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-check-circle-o nav-icon"></i> Import Excel
                    </a>
                </li> -->
            </ul>
        </li>
        @endif
        @if($role == 'admin')
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Contact
            </a>
            <ul class="nav-dropdown-items">
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
            </ul>
        </li>
        @endif
        @if($role =='user' || $role =='admin')
        <li class="nav-title">MANAJEMEN ORDER</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-settings"></i> Pembelian
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Pembelian
                        </a>
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i> Return Pembelian
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-settings"></i> Penjualan
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issuing.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Penjualan
                        </a>
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i> Return Penjualan
                        </a>
                        <a class="nav-link" href="{{route('issuing.print_nota')}}">
                            <i class="nav-icon icon-puzzle"></i> Print Nota
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        @endif
        @if($role =='admin')
        <li class="nav-title">MANAJEMEN LAPORAN</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="javascript">
                    <i class="nav-icon icon-settings"></i> Laporan
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.data_barang') }}">
                            <i class="nav-icon icon-puzzle"></i>Laporan Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoice.report_purchase') }}">
                            <i class="nav-icon icon-puzzle"></i>Laporan Pembelian
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i>Return Pembelian
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoice.index') }}">
                            <i class="nav-icon icon-puzzle"></i>Laporan Penjualan
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i>Return Penjualan
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('report.in_item')}}">
                            <i class="nav-icon icon-puzzle"></i>In / Out Barang
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i>Pendapatan
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon icon-puzzle"></i>Product Terlaris
                        </a>
                    </li> -->
                </ul>
            </li>
        </li>
        @endif
        @if($role =='admin')
        <li class="nav-title">Tools</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="javascript">
                    <i class="nav-icon icon-settings"></i> Setting
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="nav-icon icon-puzzle"></i> User
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        @endif
    </ul>
</nav>
