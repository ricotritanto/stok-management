@extends('layouts.admin')

@section('title')
    <title>List Products</title>
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Laporan In Out Barang</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="dropdown float-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Choose Page:
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('report.in_item')}}">Barang Masuk</a>
                                    <a class="dropdown-item" href="{{route('report.out_item')}}">Barang Keluar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                            <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                            <div class="table-responsive"  id="product">
                                <table class="table table-hover table-bordered" id="example" name="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Satuan</th>
                                            <th>Qty Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($product as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>
                                                <div class="barcode">
                                                    {!! DNS1D::getBarcodeHTML($row->code, "C128",1.4,22) !!}
                                                </div>
                                                <p>{{$row->product->code}}</p>
                                            </td>
                                            <td>
                                                <strong>{{ $row->product->name }}</strong><br>
                                                <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                                <label>Category: <span class="badge badge-info">{{ $row->product->category->name }}</span></label><br>
                                            </td>
                                            <td>{{$row->product->satuan->name}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->created_at->format('d-m-Y')}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="13" class="text-center">Empty Data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        // dom: 'Bfrtip',
        buttons: [
        {
            extend: 'print',
            text: 'Print current page',
            autoPrint: false
        }
    ]
    });
  });
</script>
