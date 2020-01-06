@extends('layouts.master')
​
@section('title')
    <title>Manajemen Brand</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        @card
                            @slot('title')
                            Add
                            @endslot
                            
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif  
​
                            <form role="form" action="{{ route('brand.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Brand</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                </div>
                            @slot('footer')
                                <div class="card-footer">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            @endslot
                        @endcard
                    </div>
                    <div class="col-md-8">
                        @card
                            @slot('title')
                            List Brand
                            @endslot
                            
                             @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif   
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Category</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($brand as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->brand_name }}</td>
                                            <td>
                                                <form action="{{ route('brand.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('brand.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                    Halaman : {{ $brand->currentPage() }} <br/>
                                    Jumlah Data : {{ $brand->total() }}                                 
                                 
                                    {{ $brand->links() }}
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </div><br/>
                </div>
            </div>
        </section>
    </div>
@endsection