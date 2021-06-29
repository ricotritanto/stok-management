@extends('layouts.admin')

@section('title')
    <title>Laporan Data Barang</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Laporan Data Barang</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Laporan Data Barang
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- JIKA TERDAPAT FLASH SESSION, MAKA TAMPILAKAN -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>SN</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Stok Qty</th>
                                    <th>H.Beli</th>
                                    <th>H.Jual</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                <!-- ADAPUN PENJELASAN ADA PADA ARTIKEL SEBELUMNYA -->
                                @php $no = 1; @endphp
                                @forelse ($product as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->code}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->serial}}</td>
                                    <td>{{$row->category->name}}</td>
                                    <td>{{$row->satuan->name}}</td>
                                    <td>{{$row->stocks}}</td>
                                    <td>{{$row->purchase_price}}</td>
                                    <td>{{$row->sell_price}}</td>
                                    <td>{{$row->updated_at}}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">Empty Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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

