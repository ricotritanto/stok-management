@extends('layouts.admin')

@section('title')
    <title>List Category</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Print nota</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Cetak Nota</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('issuing.pdf') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Masukkan No Facture</label>
                                    <input type="text" name="facture" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Print</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
