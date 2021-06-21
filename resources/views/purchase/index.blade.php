@extends('layouts.admin')

@section('title')
    <title>List Penjualan</title>
@endsection

@section('content')
<?PHP $tanggal= date('d-m-Y');?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        @card
                            @slot('title')
                            @endslot


                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @csrf
                            <div class="form-group">
                                <label for="name">No Facture</label>
                                <input type="text" name="facture" id="facture" value="{{$code}}" class="form-control {{ $errors->has('facture') ? 'is-invalid':'' }}" id="facture" required>
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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        <table class="table">
                            <tbody>
                                <td><label for="name">Suplier</label></td>
                                <td>:</td>
                                <td><select class="form-control select2" name="suplier" id="suplier" required class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                                <option value="">Pilih Suplier</option>
                                    @foreach ($suplier as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst($row->suplier_name) }}</option>
                                    @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('suplier_id') }}</p>
                                </td>
                                <td><h3><label for="name">(F2)</label></h3></td>
                                <tr></tr>
                                <td> <label for="name">Product Code</label></td>
                                <td>:</td>
                                <td> <input type="text" name="code" id="code" class="form-control input-sm" onfocus="this.value=''"  required></td>
                                <td><button type="submit" id="btn" class="btn btn-primary">Insert</button></td>
                                <td><h3><label for="name">(F10)</label></h3></td>
                            </tbody>
                        </table>
                        <div class="form-group" id="detailpro">

                        </div>

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
                                <table class="table table-hover" id="aa">
                                    <thead>
                                        <tr>
                                            <!-- <td>#</td> -->
                                            <td>Product Code</td>
                                            <td>Product Name</td>
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
                                                <td><button id="save" class="btn btn-warning">Save</button>&nbsp;&nbsp;  <i><strong> / (F4)</strong></i></td>
                                            </tbody>
                                    </table>
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
</main>
@endsection
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
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
        reloadtotal();
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
                    // $("#detailpro").empty();
                   $('#detailpro').html(msg);
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
<!-- END PAY-->
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
        var price = $("#price").val();
        var facture = $("#facture").val();
        var date = $("#date").val();
        var suplier = $("#suplier").val();
        var total = $("#total").val();
        addToCart(code, name, qty, facture, date, suplier, idpro,price, total);
    })

    function addToCart(code, name, qty, facture, date, suplier, idpro, price, total){
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
                    tampung[i].Total = parseInt(tampung[i].Qty) * parseInt(price);
                    showCart();
                    return;
                }
        }
        var item = { code: code, name:name, Qty:qty, facture:facture, date:date, suplier:suplier, Id:idpro, price:price, Total:total};
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
            output += '<input type="hidden" required name="product[]" id="product" value="'+item.Id+'"/>';
            output += '<input type="hidden" required name="facture" id="facture'+count+'"" value="'+item.facture+'"/>';
            output += '<input type="hidden" required name="date" id="date'+count+'"" value="'+item.date+'"/>';
            output += '<input type="hidden" required name="suplier" id="suplier'+count+'" value="'+item.suplier+'"/></td>';
            output += '<td><input type="text" name="code[]" id="code'+count+'"" value="'+item.code+'" class="form-control input-sm" readonly required /></td>';
            output += '<td><input type="text" name="name[]" id="name'+count+'" value="'+item.name+'" class="form-control input-sm" readonly  required /></td>';
            output += '<td><input type="text" name="price[]" id="price'+count+'" value="'+item.price+'" class="form-control input-sm" readonly  required /></td>';
            output += '<td class="ikibakaltakupdate"><input type="text" name="qty[]" id="qty'+count+'" value="'+item.Qty+'" class="form-control input-sm" readonly required /></td>';
            output += '<td><input type="text" name="total[]" id="total'+count+'"  value="'+item.Total+'" class="untukInput1" onblur="reloadtotal()" readonly /></td>';
            output += '<td><input type="button" class="sifucker btn-default" name="x" value="Delete" onclick="deleterow(this)"  readonly/></td>';

            output += '</tr>';
            $("#tampilane").append(output);
          }
            reloadtotal();
          $("#code").focus();
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
<!-- SHORTCUT KEY -->
<script>
    document.onkeydown = function (e) {
        switch (e.keyCode) {
            // F2
            case 113:
               $("#suplier").focus();
                break;
            // F10
            case 121:
               $("#code").focus();
                break;
            // F4
            case 115:
               $("#save").focus();
                break;
            // F5
            case 116:
              window.reload();
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
<script>
    function runPopup(){
    var respond = prompt("Masukkan No Facture: ");

      window.alert("Hai, " + respond + "!");

    };
  </script>
