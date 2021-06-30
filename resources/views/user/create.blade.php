@extends('layouts.admin')
@section('title')
    <title>Add User</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Tambah User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-header">
                                <strong>User</strong>
                                <small>Form</small>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('nama_user') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" />
                                </div>
                                <div class="form-group">
                                    <label>Level <span class="text-danger">*</span></label>
                                    <select class="form-control" name="level" />
                                    @foreach($levels as $key => $val)
                                    @if($key==old('level'))
                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $val }}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-danger" href="{{ route('user.index') }}">Kembali</a>
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
