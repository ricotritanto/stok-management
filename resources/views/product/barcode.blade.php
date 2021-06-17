@extends('layouts.admin')

@section('title')
    <title>List Products</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

          	<!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
            <form action="" >
                @csrf
              	<!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->

              	<!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cetak Barcode</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Barcode</label>
                                    <div class="col-sm-1"> : </div>
                                    <div class="col-sm-4">
                                        {!! DNS1D::getBarcodeHTML($product->code, "C128",1.4,22) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-sm-2 col-form-label">Product Code</label>
                                    <div class="col-sm-1"> : </div>
                                    <div class="col-sm-4">
                                        <input type="text" readonly class="form-control-plaintext" id="code" name="code" value="{{ $product->code }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-1"> : </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" id="name" class="form-control-plaintext" readonly value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('product.cetakbarcode', $product->code) }}" target="_blank" class="btn btn-primary btn-lg float-right"><i class="fa fa-print" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
