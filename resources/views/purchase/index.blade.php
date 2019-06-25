@extends('layouts.master')
​
@section('title')
    <title>Manajemen Order</title>
@endsection
​
@section('content')
<?PHP $tanggal= date('d-m-Y');?>
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
                    <div class="col-md-7">
                        @card
                            @slot('title')
                            @endslot
                            
                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif                            
                            
                            @csrf
                            <div class="form-group">
                                <label for="name">No Facture</label>
                                <input type="text" name="facture" id="facture" value="{{$code}}" class="form-control {{ $errors->has('facture') ? 'is-invalid':'' }}" id="facture" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Product Code</label>
                                <input type="text" name="code" id="code" class="form-control input-sm" required>
                            </div>
                            <div class="form-group" id="detailpro">

                            </div>
                                                         
                            @slot('footer')  
                            @endslot
                        @endcard
                    </div>
                    <div class="col-md-5">
                        @card
                            @slot('title')                            
                            @endslot                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif                        
                        <div class="form-group">
                            <label for="name">Date</label>
                            <div class="input-group" >
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="datepicker" class="form-control" id='date' value="{{ $tanggal}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Suplier</label>
                            <select class="form-control select2" name="suplier" id="suplier" required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Suplier</option>
                                    @foreach ($suplier as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->suplier_name) }}</option>
                                    @endforeach                                        
                            </select>
                            <p class="text-danger">{{ $errors->first('suplier_id') }}</p>
                        </div>      
                        
                         <td><button type="submit" id="btn" class="btn btn-sm btn-primary">Insert</button></td>
                           
                         @slot('footer')​
                            @endslot
                        @endcard
                    </div>
                    </div>
                    <div class="col-md-12">
                        @card
                            @slot('title')
                            List Purchase
                            @endslot
                           
                            <form action="{{ route('purchase.store')}}" method="post">        
                            @csrf                        
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <!-- <td>#</td> -->
                                            <td>Product Code</td>
                                            <td>Product Name</td>
                                            <td>Qty</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tampilane">
                                        
                                    </tbody>
                                    
                                </table>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Save</button>
                                </div>
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
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
  $(function () {
   $( "#date" ).datepicker({
    format: "dd-mm-yyyy",
    weekStart: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    rtl: true,
    orientation: "auto"
    });
  })
  </script>


<script type="text/javascript">
    $(document).ready(function(){
        
        $("#code").focus();
        $("#code").keyup(function(){

        var data = {code:$(this).val()};
            $.ajax({
               headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                   url : "{{route('purchase.product')}}",
                   type: "POST",
                   data: data,
                   success: function(msg){
                    if (data.code === null){
                           alert ("Code Tidak ada")
                   }else{
                    // $("#detailpro").empty();
                   $('#detailpro').html(msg);
                   }
                   },
                 
                });
            }); 

        $("#code").keypress(function(e){
            if(e.which==13){
                $("#qty").focus();
            }
        });
    });
</script>

<script>
    var tampung = [];
    $(document).ready(function(){
        $('#btn').click(function (e) {
        e.preventDefault();
        
        // var count = 0;
        var idpro = $("#idpro").val();  
        var code = $("#code").val();             
        var name = $("#proname").val();
        var qty = $("#qty").val();
        var facture = $("#facture").val();
        var date = $("#date").val();
        var suplier = $("#suplier").val();
        addToCart(code, name, qty, facture, date, suplier, idpro);
    })

    function addToCart(code, name, qty, facture, date, suplier, idpro){
        if(qty=="" || suplier=="")
        {
            alert('Data belum lengkap')
            return false;
        }else
        {
            for (var i in tampung)
                if(tampung[i].Id ==idpro)
                {
                    tampung[i].Qty = parseInt(tampung[i].Qty) + parseInt(qty);
                    showCart();
                    return;
                }
        }
        var item = { code: code, name:name, Qty:qty, facture:facture, date:date, suplier:suplier, Id:idpro}; 
          tampung.push(item);
          showCart();
    }

    function showCart(){
        $("#tampilane").empty();
          for (var i in tampung) 
          { 
            var item = tampung[i];
            var count = 0;
            
            // var row = '<tr><td>'+item.code+'</td><td>'+item.name+'<input type="hidden" name="produk[]" id="produk" class="produk" value="'+item.Id+'" /><td class="ikibakaltakupdate">'+item.Qty+' <input type="hidden" name="qty[]" id="qtyne" value="'+item.Qty+'" /></td><td><input type="button" class="a" name="xy" value="Update" onclick="upd(this)" /></td><td><input type="button" class="sifucker" name="x" value="Delete" onclick="hapuse(this)" /></td></tr>';      
            // var row = '<tr>';
            // var row = '<td>'+item.code+'</td>';
            // var row = '<td>'+item.name+'<input type="hidden" name="produk[]" id="produk" class="produk" value="'+item.Id+'" /></td>';
            // var row = '<td class="ikibakaltakupdate">'+item.Qty+' <input type="hidden" name="qty[]" id="qtyne" value="'+item.Qty+'" /></td>';
            
            // var row = '</tr>';
            // $("#tampilane").append(row); 
            
            count = count + 1;
            output = '<tr class="records" id="row_'+count+'">';
            output += '<input type="hidden" name="product[]" id="product" value="'+item.Id+'"/>';
            output += '<input type="hidden" name="facture" id="facture'+count+'"" value="'+item.facture+'"/>';
            output += '<input type="hidden" name="date" id="date'+count+'"" value="'+item.date+'"/>';
            output += '<input type="hidden" name="suplier" id="suplier'+count+'" value="'+item.suplier+'"/></td>';
            output += '<td><input type="text" name="code[]" id="code'+count+'"" value="'+item.code+'" class="form-control input-sm" readonly /></td>';
            output += '<td><input type="text" name="name[]" id="name'+count+'" value="'+item.name+'" class="form-control input-sm" readonly /></td>';
            output += '<td class="ikibakaltakupdate"><input type="text" name="qty[]" id="qty'+count+'" value="'+item.Qty+'" class="form-control input-sm" readonly /></td>';
            output += '<td><input type="button" class="sifucker" name="x" value="Delete" onclick="jembut(this)"  readonly/></td>';
        
            output += '</tr>';
            $("#tampilane").append(output); 
          }
        }     
   })   

</script>