@extends('layouts.admin')

@section('title')
    <title>Update Satuan</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Update Satuan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Satuan</h4>
                        </div>
                        <div class="card-body">
                          	<!-- ROUTINGNYA MENGIRIMKAN ID CATEGORY YANG AKAN DIEDIT -->
                            <form action="{{ route('satuan.update', $satuan->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Satuan</label>
                                    <input type="text" name="name" class="form-control" value="{{ $satuan->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
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
