@extends('layouts.master')
​
@section('title')
    <title>Input Customer</title>
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
                            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
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
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <form action="{{ route('customer.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Code :</label>
                                    <input type="text" name="code" required 
                                        maxlength="10" value={{$code}} readonly
                                        class="form-control {{ $errors->has('customer_code') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('customer_code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Name :</label>
                                    <input type="text" name="name" id="name" required 
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>  
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                        <input type="text" name="phone" id="phone" required 
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                </div>                                
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" id="address" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}"></textarea>
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
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