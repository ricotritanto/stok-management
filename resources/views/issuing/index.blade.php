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
                                <input type="text" name="facture" id="facture" readonly value="{{$code}}" class="form-control {{ $errors->has('facture') ? 'is-invalid':'' }}" required>
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
                            @slot('footer')  
                            @endslot
                        @endcard
                    </div>
                    <div class="col-md-8">
                        @card
                            @slot('title')                            
                            @endslot                            
                            <!-- @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif   -->                          
                            @if(session('modal_message_error'))
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                    $("#add-error-bag").hide();
                                    $('#modal-print').modal('show');
                                });
                               </script>
                                @endif   
                               
                                          
                        <table class="table">                            
                            <tbody>                                        
                                <td><label for="name">Customer</label></td>
                                <td>:</td>                                          
                                <td>
                                    <select class="form-control select2" name="customer" id="customer" required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                        <option value="">Pilih customer</option>
                                    @foreach ($customer as $row)
                                        <option value="{{ $row->id }}">{{ucfirst($row->customer_code)}}- - {{ucfirst($row->name) }}</option>
                                    @endforeach                                        
                                    </select>
                                    <p class="text-danger">{{ $errors->first('customer_id') }}</p></td>
                                <td>
                                    <a onclick="event.preventDefault();addTaskForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Customer</span></a></td>
                                <tr></tr>                 
                                <td> <label for="name">Product Code</label></td>
                                <td>:</td>
                                <td> 
                                    <input type="text" name="code" id="code" class="form-control input-sm" onfocus="this.value=''"  required></td>
                                <td><button type="submit" id="btn" class="btn btn-primary">To Cart</button></td> 
                                </tbody>
                        </table>

                        <div class="form-group" id="detailpro">

                        </div>
                         @slot('footer')​
                            @endslot
                        @endcard
                    </div>      
                    <div class="col-md-12">   
                    <form action="{{ route('issuing.store')}}" method="post" >        
                    @csrf                  
                        @card
                            @slot('title')
                            Record Data
                            @endslot
                            <div class="table-responsive">
                                <table class="table table-hover" id="aa">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Product Code</td>
                                            <td>Item</td>
                                            <td>Price</td>
                                            <td>Qty</td>
                                            <td>Total</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tampilane">
                                        
                                    </tbody>                                    
                                </table>
                                <div class="col-md-auto">
                                    <div class="table-responsive">
                                    <table class="table table-hover" id="aa">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                            <td><label for="name">GRAND TOTAL</label></td>
                                            <td>:</td>                                          
                                            <td><input type="text" name="grandtot" class="form-control"  style="font-weight: bold; "  id="grandtot" readonly=""/></td>
                                            <td><label for="name">KEMBALI</label></td>
                                            <td>:</td>                                
                                            <td><input type="text" name="kembali" class="form-control" id="kembali" style="font-weight: bold;color:red;"readonly="" /></td> 

                                            <tr></tr>                                           
                                            <td> <label for="name">CASH</label></td>
                                            <td>:</td>
                                            <td> <input type="text" name="bayar" class="form-control" style="font-weight: bold;"  id="bayar" required="" /></td>
                                            <td></td>
                                            <td></td>
                                            <td><button type="submit" id="paymen" class="btn btn-warning"><i class="fa fa-credit-card"></i>Process Payment</button>
                                                <button onclick="printpay()" id="print" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</button>
                                                <button type="button" class="btn btn-primary" id="generate"><i class="fa fa-download"></i>Generate PDF</button></td> 
                                                <a onclick="event.preventDefault();popup();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Save</span></a>
                                            </tbody>
                                    </table>
                                    </div>
                               </div>
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </form>
                    </div>
                </div>
            </div>
        </section>    
    </div>  @include('customer.cs_add')
    </div>  @include('issuing.nota')
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
  $(function () { //function datepicker
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
        reloadtotal();
        $("#code").focus();
        $("#code").keyup(function(){
        var data = {code:$(this).val()};
        if(this.value.length==7) {
            $.ajax({
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                   url : "{{route('issuing.product')}}",
                   type: "POST",
                   data:data,
                   success: function(data){
                    $('#detailpro').html(data);
                }
                   
                });
        }   }); 

        $("#code").keypress(function(e){
            if(e.which==13){
                $("#qty").focus();
            }        
        });
    });
</script>
<!-- JS PAY -->
<script type="text/javascript">
    $(document).ready(function(){        
        $('#btn').click(function (e) {
        e.preventDefault();
        $("#pay").keyup(function(){
        var harga  = parseInt($("#price").val());
        var qty  = parseInt($("#qty").val());
        var total = harga*qty;
        // var total = harga - (harga*(diskon/100));
        $("#pay").val(total);
      });
          $('.amount').change(function() {
                    reloadtotal();
                });     
        })
    });    
</script>
<!-- END JS PAY -->
<script>
    var tampung = [];
    $(document).ready(function(){
        $('#btn').click(function (e) {
        e.preventDefault();
        
        var idpro = $("#idpro").val();
        var facture = $("#facture").val();
        var date = $("#date").val();  
        var code = $("#kode").val();             
        var name = $("#proname").val();
        var customer = $("#customer").val();
        var price = $("#price").val();
        var qty = $("#qty").val();
        var total = $("#total").val();
        addToCart(facture, date, code, name, qty,customer, price,total,idpro);
    })

    function addToCart(facture, date, code, name, qty,customer, price, total, idpro){
        if(code =="" || name =="" || customer ==""|| qty=="" || total=="")
        {
            alert('Data Belum Lengkap !!')
            return false;
        }else
        {
            for (var i in tampung)
                if(tampung[i].Id ==idpro)
                {
                    tampung[i].Qty = parseInt(tampung[i].Qty) + parseInt(qty);
                    tampung[i].Total = parseInt(tampung[i].Qty) * parseInt(price);
                    showCart();
                    return;
                }
        }
        var item = { facture:facture, date:date, code: code, name:name,price:price, Qty:qty, customer:customer, Total:total, Id:idpro}; 
        tampung.push(item);
        showCart();
    }

    function showCart(){
        $("#tampilane").empty();
        var a =1;
          for (var i in tampung ) 
          { 
            var item = tampung[i];
            var count = 0;

            count = count + 1;
            output = '<tr class="records" id="row_'+count+'">';
            output += '<input type="hidden" name="product[]" id="product" value="'+item.Id+'"/>';
            output += '<input type="hidden" name="facture" id="facture'+count+'"" value="'+item.facture+'"/>';
            output += '<input type="hidden" name="date" id="date'+count+'"" value="'+item.date+'"/>';
            output += '<input type="hidden" name="customer" id="customer'+count+'" value="'+item.customer+'"/></td>';
            output += '<td><input type="text" name="count[]" id="count'+count+'"" value="'+a+++'" class="untukInput1" style="width:25PX;margin-right:5px;" readonly /></td>';
            output += '<td><input type="text" name="code[]" id="code'+count+'"" value="'+item.code+'" class="untukInput1" style="width:100PX;margin-right:5px;" readonly /></td>';
            output += '<td><input type="text" name="name[]" id="name'+count+'" value="'+item.name+'" class="untukInput1" style="width:200PX;margin-right:5px;" readonly /></td>';
            output += '<td><input type="text" name="price[]" id="price'+count+'" value="'+item.price+'" class="untukInput1" style="width:100PX;margin-right:5px;" readonly /></td>';
            output += '<td class="ikibakaltakupdate"><input type="text" name="qty[]" id="qty'+count+'" value="'+item.Qty+'" class="untukInput1" style="width:80PX;margin-right:5px;"  /></td>';
            output += '<td><input type="text" name="total[]" id="total'+count+'"  value="'+item.Total+'" class="untukInput1" onblur="reloadtotal()" readonly /></td>';
            
            output += '<td><input type="button" class="sifucker" name="x" value="Delete" onclick="deleterow(this)"  readonly/></td>';
            output += '</tr>';

            $("#tampilane").append(output); 
          }                
          reloadtotal();
          $("#code").focus(); // memanggil function reloadtotal() untuk melihat hasil grandtotal
        }  
 
   })   

function reloadtotal() // function untuk menghitung grandtotal 
{
    var arr = document.getElementsByName('total[]'); // mengambil value dari  function showcart() dengan name=total[]
    var tot=0; // default tot 0 
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    var number_string = tot.toString(), //merubah value tot ke string
    split   = number_string.split(','), // split dengan koma
    sisa    = split[0].length % 3, 
    rupiah  = split[0].substr(0, sisa),
    ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
            
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    document.getElementById('grandtot').value = rupiah; // hasil perhitungan (value = tot) ditampilkan di kolom dengan name=grandtot
}

function deleterow(e) // function untuk delete row pada list cart
{
    $(e).parents(".records").fadeOut();
    $(e).parents(".records").remove();
    reloadtotal();
}

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
            url: "{{route('customer.store')}}",
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
                console.log(data);
                // var errors = $.parseJSON(data.responseText);
                // $('#add-task-errors').html('ERORR BONG');
                // $.each(errors.messages, function(key, value) {
                //     $('#add-task-errors').append('<li>' + value + '</li>');
                // });
                // $("#add-error-bag").show();
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

function popup()
{
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#modal-print').modal('show');
    });
}

function printinvoice() {
    $.ajax({
        type: 'POST',
        url: '/issuing/generatepdf/',
        dataType: 'json',
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#addForm input[name=facture]").val(data.issuing.issuing_facture);
            $("#addForm input[name=grandtot]").val(data.issuing.grandtotal);
            $("#addForm input[name=cash]").val(data.issuing.bayar);
            $("#addForm input[name=kembali]").val(data.issuing.kembali);
            $("#addForm input[name=id]").val(data.issuing.id);
            $('#modal-print').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

</script>
<!-- SHORTCUT KEY -->
<script>
    document.onkeydown = function (e) {
        switch (e.keyCode) {
            // F2
            case 113:
               $("#customer").focus();
                break;
            // F3
            case 114:
               $("#code").focus();
                break;
            // F4
            case 115:
               $("#payment").focus();
                break;
            // F5
            case 116:
              window.reload();
                break;
            // f10
            case 121:
                $("#bayar").focus();
                break;
            // F8
            case 119 :
               $("#print").focus();
                break;
        }
        //menghilangkan fungsi default tombol
        // e.preventDefault();
    };
</script>
<!-- END SHORTCUT KEY -->
<script type="text/javascript">
    $(document).ready(function(){        
        // $("#bayar").focus();      
        $("#bayar").keypress(function(e){
            if(e.which==13){
                $("#kembali").focus();
            }
        });
        $("#bayar").keyup(function(){
        var grandtot  = convertToAngka($("#grandtot").val());
        var bayar  = convertToAngka($("#bayar").val());
        var kembali = bayar-grandtot;
        
        // var total = harga - (harga*(diskon/100));
        var number_string = kembali.toString(), //merubah value tot ke string
        split   = number_string.split(','), // split dengan koma
        sisa    = split[0].length % 3, 
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        document.getElementById('kembali').value = rupiah; 
      });
    function convertToAngka(rupiah)
    {
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }
    });    
</script>
<script>
    $(document).ready(function(){
       var bayare = document.getElementById('bayar');
        bayar.addEventListener('keyup', function(e)
        {
            bayar.value = formatRupiah(this.value);
        });  
    })
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   = number_string.split(','),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<style type='text/css'> 
input.untukInput1 { /* function disable border table*/
  border-bottom: 0px solid #ccc;
  border-left:none;
  border-right:none;
  border-top:none;
 }
 input.totale{
  border-bottom: 0px solid #ccc;
  border-left:none;
  border-right:none;
  border-top:none;
  width: 100%;
  text-align: right;
  font-size:30Px;
 }
</style>
<!-- <script type="text/javascript">
    function printpay()
    {
        var txt;
        var person = prompt("Please enter No Facture:""");
          if (person == null || person == "") {
            txt = "User cancelled the prompt.";
          } else {
            txt = "Hello " + person + "! How are you today?";
          }
          document.getElementById("demo").innerHTML = txt;

    }
</script> -->


