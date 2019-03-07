@extends('layouts.master')
​
@section('title')
    <title>Input Product</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">Add</li>
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
                            @endslot                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif
                            @if (session('error'))
                            @alert(['type' => 'error'])
                                    {!! session('error') !!}
                            @endif
                            <form action="{{ route('product.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" required 
                                        maxlength="10"
                                        class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id="name" required 
                                        class="form-control {{ $errors->has('product_name') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand_id" id="brand_id" 
                                        required class="form-control {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($brand as $row)
                                            <option value="{{ $row->brand_id }}">{{ ucfirst($row->brand_name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('brand_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" id="category_id" 
                                        required class="form-control {{ $errors->has('category_id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->category_id }}">{{ ucfirst($row->category_name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="description" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" name="stock" required 
                                        class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                                </div>                               
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-send"></i> Insert
                                    </button>
                                </div>
                            </form>
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