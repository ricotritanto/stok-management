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
                                    <th>Qty</th>
                                    <th>Satuan</th>
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
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- <script src="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" type="text/css"></script> -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer  type="text/javascript"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<!-- <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}" defer></script> -->
<!-- <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script> -->
<!-- SlimScroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script>
 $(function () {
    // $("#example").DataTable();
    $('#example').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
