@extends('master')
​
@section('title')
    <title>Input Product</title>
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
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
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
                            <form action="{{ route('product.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" required 
                                        maxlength="10"
                                        class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('code') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Serial Number</label>
                                    <input type="text" name="serial" id="serial" required 
                                        class="form-control {{ $errors->has('serial') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('serial') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id="name" required 
                                        class="form-control {{ $errors->has('product_name') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand_id" id="brand_id" 
                                        required class="form-control {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($brand as $row)
                                            <option value="{{ $row->id }}">{{ ucfirst($row->brand_name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('brand_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" id="category_id" 
                                        required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->id }}">{{ ucfirst($row->category_name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Purchase Price</label>
                                    <input type="text" name="pprice" id="pprice" required 
                                        class="form-control {{ $errors->has('purchase_price') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('purchase_price') }}</p>
                                </div>    
                                <div class="form-group">
                                    <label for="">Sell Price</label>
                                    <input type="text" name="sprice" id="sprice" required 
                                        class="form-control {{ $errors->has('sell_price') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('sell_price') }}</p>
                                </div>         

                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" name="stock" required 
                                        class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="description" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
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
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
   var tanpa_rupiah = document.getElementById('pprice');
	
	tanpa_rupiah.addEventListener('keyup', function(e)
	{
		tanpa_rupiah.value = formatRupiah(this.value);
	});
})
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

    
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
    var abc = document.getElementById('sprice');
    abc.addEventListener('keyup', function(e)
	{
        abc.value = formatsell(this.value);
    });
})
	
    function formatsell(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
    </script>