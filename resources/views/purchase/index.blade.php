@extends('layouts.master')
​
@section('title')
    <title>Manajemen Order</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Purchase</li>
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
                            @endslot
                            
                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
​
                            <form role="form" action="{{ route('purchase.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">No Facture</label>
                                    <input type="text" name="facture" value="{{$code}}" class="form-control {{ $errors->has('facture') ? 'is-invalid':'' }}" id="facture" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    <input type="text" name="datepicker" class="form-control {{ $errors->has('date') ? 'is-invalid':'' }}" id="datepicker" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Suplier</label>
                                    <select class="form-control select2" name="suplier" id="suplier"
                                        required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih Suplier</option>
                                            @foreach ($suplier as $row)
                                                <option value="{{ $row->id }}">{{ ucfirst($row->suplier_name) }}</option>
                                            @endforeach                                        
                                    </select>
                                    <p class="text-danger">{{ $errors->first('suplier_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Code</label>
                                    <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" id="code" required>
                                </div>
                            @slot('footer')                                
                            </form>
                            @endslot
                        @endcard
                    </div>
                    <div class="col-md-8">
                        @card
                            @slot('title')
                            List Purchase
                            @endslot
                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Product Code</td>
                                            <td>Product Name</td>
                                            <td>Qty</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
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
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
  $(function () {
    //Timepicker
    $('.datepicker').datepicker({
      timePicker         : true,
      showInputs: false,
      format             : 'DD/MM/YYYY'
    })
  })
  </script>