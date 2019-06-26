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
                            <li class="breadcrumb-item active">Issuing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
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
                                <label for="name">Nota /No.Facture</label>
                                <input type="text" name="facture" id="facture" readonly value="{{$code}}" class="form-control {{ $errors->has('facture') ? 'is-invalid':'' }}" id="facture" required>
                            </div>       

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
                            <label>Customer</label>
                            <select class="form-control select2" name="customer" id="customer" required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                <option value="">Pilih customer</option>
                                    @foreach ($customer as $row)
                                        <option value="{{ $row->id }}">{{ucfirst($row->customer_code)}}- - {{ucfirst($row->name) }}</option>
                                    @endforeach                                        
                            </select>
                            <p class="text-danger">{{ $errors->first('customer_id') }}</p>
                        </div>                              
                        <div class="col-sm-3">
                        <a onclick="event.preventDefault();addTaskForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Customer</span></a>
                        </div>                
                            @slot('footer')  
                            @endslot
                        @endcard
                    </div>
                    <div class="col-md-9">
                        @card
                            @slot('title')                            
                            @endslot                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif                        
                        
                            <div class="form-group">
                            <label for="name">Product Code</label>
                            <input type="text" name="code" id="code" class="form-control input-sm" required>
                        </div>
                        <div class="form-group" id="detailpro">

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
                            List Issuing
                            @endslot
                           
                            <form action="{{ route('issuing.store')}}" method="post">        
                            @csrf                        
                            <div class="table-responsive">
                                <table class="table table-hover" id="aa">
                                    <thead>
                                        <tr>
                                            <!-- <td>#</td> -->
                                            <td>Product Code 
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>
                                            </td>
                                            <td>Product Name
                                                <input type="text" name="name" id="name" value="" class="form-control input-sm">    
                                            </td>
                                            <td>Price
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>    
                                            </td>
                                            <td>Qty
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>  
                                            </td>
                                            <td>Diskon%
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>  
                                            </td>
                                            <td>PPN % 
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>  
                                            </td>
                                            <td>Total 
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>  
                                            </td>
                                            <!-- <td>Action
                                                <input type="text" name="code" id="code" class="form-control input-sm" required>  
                                            </td> -->
                                        </tr>
                                    </thead>
                                    <!-- <tbody id="tampilane">
                                        
                                    </tbody> -->
                                    
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
    </div>  @include('customer.cs_add')
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
                   url : "{{route('issuing.product')}}",
                   type: "POST",
                   data: data,
                   success: function(msg){
                   $('#detailpro').html(msg);
                   }
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
        var customer = $("#customer").val();
        addToCart(code, name, qty, facture, date, customer, idpro);
    })

    function addToCart(code, name, qty, facture, date, customer, idpro){
        if(qty=="")
        {
            alert('QTY Empty')
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
        var item = { code: code, name:name, Qty:qty, facture:facture, date:date, customer:customer, Id:idpro}; 
          tampung.push(item);
          showCart();
    }

    function showCart(){
        $("#tampilane").empty();
          for (var i in tampung) 
          { 
            var item = tampung[i];
            var count = 0;            
            
            count = count + 1;
            output = '<tr class="records" id="row_'+count+'">';
            output += '<input type="hidden" name="product[]" id="product" value="'+item.Id+'"/>';
            output += '<input type="hidden" name="facture" id="facture'+count+'"" value="'+item.facture+'"/>';
            output += '<input type="hidden" name="date" id="date'+count+'"" value="'+item.date+'"/>';
            output += '<input type="hidden" name="customer" id="customer'+count+'" value="'+item.customer+'"/></td>';
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
<script type="text/javascript">
    $(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/customer',
            data: {
                code: $("#modal-form input[name=code]").val(),
                name: $("#modal-form input[name=name]").val(),
                phone: $("#modal-form input[name=phone]").val(),
                address: $("#modal-form input[name=address]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#modal-form').trigger("reset");
                $("#modal-form .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-task-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    
    
});

function addTaskForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#modal-form').modal('show');
    });
}



</script>
