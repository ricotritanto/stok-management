@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Supliers</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
          
          	<!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
            <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                    <div class="card">
                    <div class="card-header">
                        <strong>Customers</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company">Code</label>
                            <input class="form-control" id="code" name="code" type="text" maxlength="10" value={{$code}} readonly>
                        </div>
                        <div class="form-group">
                            <label for="vat">Name</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="nama Customer" required >
                        </div>
                        <div class="form-group">
                            <label for="vat">Email</label>
                            <input class="form-control" id="email" name="email" type="text" placeholder="email" required >
                        </div>
                        <div class="form-group">
                            <label for="vat">Phone</label>
                            <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone" required >
                        </div>
                        <div class="form-group">
                            <label for="street">Address</label>
                            <input class="form-control" name="address" id="address"  type="text" placeholder="Enter street name">
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="city">City</label>
                            <input class="form-control" id="city" name="city" type="text" placeholder="Enter your city" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="postal-code">Postal Code</label>
                            <input class="form-control" id="postal" name="postal" type="text" placeholder="Postal Code">
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Add</button>
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
