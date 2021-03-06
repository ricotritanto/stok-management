@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Suplier</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
          
          	<!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
            <form action="{{ route('suplier.update', $suplier->id) }}" method="post" >
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-sm-6">
                    <div class="card">
                    <div class="card-header">
                        <strong>Supliers</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company">Code</label>
                            <input class="form-control" id="code" name="code" type="text" maxlength="10" value="{{ $suplier->suplier_code }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vat">Name</label>
                            <input class="form-control" id="name" name="name" type="text" value="{{ $suplier->suplier_name }}" required >
                        </div>
                        <div class="form-group">
                            <label for="vat">Email</label>
                            <input class="form-control" id="email" name="email" type="text" value="{{ $suplier->email }}" required >
                        </div>
                        <div class="form-group">
                            <label for="vat">Phone</label>
                            <input class="form-control" id="phone" name="phone" type="text" value="{{ $suplier->phone }}" required >
                        </div>
                        <div class="form-group">
                            <label for="street">Address</label>
                            <input class="form-control" name="address" id="address"  type="text" value="{{ $suplier->address }}">
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="city">City</label>
                            <input class="form-control" id="city" name="city" type="text" value="{{ $suplier->city }}" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="postal-code">Postal Code</label>
                            <input class="form-control" id="postal" name="postal" type="text" value="{{ $suplier->postal_code }}">
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Update</button>
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
