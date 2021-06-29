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
                                <table class="table table-striped table-bordered" id="example" name="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Satuan</th>
                                            <th>Qty Masuk</th>
                                            <th>Date</th>
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
<script type="text/javascript" src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Cetak',
                autoPrint: true
            }
        ]
    });
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
  });
</script>
