@extends('layouts.admin')

@section('title')
    <title>List Products</title>
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Products

                                <!-- BUAT TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
                                <a href="#" class="btn btn-danger btn-sm">Mass Upload</a>
                                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>
                            </h4>
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

                            <!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
                            <form action="{{ route('product.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">Cari</button>
                                    </div>
                                </div>
                            </form>

                            <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                            <div class="table-responsive"  id="product">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Product</th>
                                            <th>Purchase Price</th>
                                            <th>Sell Price</th>
                                            <th>Stock</th>
                                            <th>image</th>
                                            <th>Status</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($product as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->code}}</td>
                                            <td>
                                                <strong>{{ $row->name }}</strong><br>
                                                <!-- ADAPUN NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                                <label>Category: <span class="badge badge-info">{{ $row->category->name }}</span></label><br>
                                                <label>Serial: <span class="badge badge-info">{{ $row->serial }}</span></label>
                                            </td>
                                            <td>{{number_format($row->purchase_price,0,",",".")}}</td>
                                            <td>{{number_format($row->sell_price,0,",",".")}}</td>
                                            <td>{{$row->stocks}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#product"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> detail</a>
                                            </td>
                                            <td>{!! $row->status_label !!}</td>
                                            <td>{{$row->created_at->format('d-m-Y')}}</td>
                                            <td>
                                                <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning btn-sm">Update</a>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
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
                            {!! $product->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@forelse($product as $row)
<div class="modal video-modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('storage/products/' . $row->image) }}" width="100px" height="100px" class="img-responsive" alt="{{ $row->name }}"/>
                        </div>
                        <div class="col-md-12 modal_body_right">
                            <h2>{{$row->name}}</h2>
                            <p>{!!$row->description !!}</p>
                        <div class="rating">
                            <strong> Serial Number : {{$row->serial}} <br>
                                      Code Product : {{$row->code}}
                            </strong>
                        </div>
                        <div class="color-quality">
                            <strong>Stock : {{$row->stocks}}</strong>
                        </div>
                    </div>
                        <div class="clearfix"> </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
  @empty
  <tr>
    <td colspan="13" class="text-center">Empty Data</td>
  </tr>
  @endforelse
