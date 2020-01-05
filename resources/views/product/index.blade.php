@extends('layouts.master')
​
@section('title')
    <title>Manajemen Product</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @card
                            @slot('title')
                            <a href="{{ route('product.create') }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> ADD
                            </a>
                            @endslot
                            
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif   
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Serial No</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Purchase Price</th>
                                            <th>Sell Price</th>
                                            <th>Stock</th>
                                            <th>Description</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($product as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->product_kode}}</td>
                                            <td>{{$row->serial}}</td>
                                            <td>{{$row->product_name}}</td>
                                            <td>{{$row->category->category_name}}</td>
                                            <td>{{$row->brand->brand_name}}</td>
                                            <td>{{number_format($row->purchase_price,0,",",".")}}</td>
                                            <td>{{number_format($row->sell_price,0,",",".")}}</td>
                                            <td>{{$row->stocks}}</td>
                                            <td>{{$row->description}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('product.edit', $row->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">DATA EMPTY</td>                                           </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                    <div class="clearfix">
                                        <div class="hint-text">Showing <b>{{$product->count()}}</b> out of <b>{{$product->total()}}</b> entries</div>
                                        {{ $product->links() }}
                                    </div>
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection