@extends('layouts.admin')

@section('title')
    <title>List User</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Setting User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline">
                                <div class="form-group mr-1">
                                    <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
                                </div>
                                <div class="form-group mr-1">
                                    <button class="btn btn-success">Refresh</button>
                                </div>
                                <div class="form-group mr-1">
                                    <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a>
                                </div>
                            </form>
                        </div>
                        <!-- body-->
                        <div class="card-body p-0 table-responsive">
                            <table class="table table-bordered table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no = 1 ?>
                                @foreach($rows as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->level }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('user.edit', $row) }}">Ubah</a>
                                        <form method="POST" action="{{ route('user.destroy', $row) }}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
