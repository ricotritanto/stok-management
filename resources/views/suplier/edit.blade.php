@extends('layouts.master')
​
@section('title')
    <title>Update Suplier</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('suplier.index') }}">Suplier</a></li>
                            <li class="breadcrumb-item active">Update</li>
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
                            
                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
                            <form action="{{ route('suplier.update', $suplier->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" required 
                                        maxlength="10" readonly
                                        value="{{ $suplier->suplier_code }}"
                                        class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Suplier Name</label>
                                    <input type="text" name="name" required 
                                        value="{{ $suplier->suplier_name }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div> 
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" required 
                                        value="{{ $suplier->email }}"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>       
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" required 
                                        value="{{ $suplier->phone }}"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                </div>                               
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" id="address" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}">{{ $suplier->address }}</textarea>
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                </div>             
                                                          
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
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