<table>
    <thead>
        <tr>
           
        </tr>
    </thead>
    <tbody>
    	<tr>
            <input type="hidden" name="idpro" id="idpro" value="{{$product->id}}">
            <!-- <td>Product Code  -->
                <input type="hidden" name="kode" id="kode" value="{{$product->code}}" style="width:50PX;margin-right:5px;" class="form-control input-sm" readonly>
            <!-- </td> -->
            <td>Product Name
                <input type="text" name="proname" id="proname" value="{{$product->name}}" style="width:175PX;margin-right:5px;" class="form-control input-sm" readonly>   
            </td>
            <td>Price
                <input type="text" name="price" id="price" value="{{$product->sell_price}}" style="width:100PX;margin-right:5px;" class="form-control input-sm" readonly>    
            </td>
            <td>Qty
                <input type="text" name="qty" id="qty" class="form-control input-sm" style="width:80PX;margin-right:5px;" onkeyup="qty(this);" required>  
            </td>  
            <td>Stok
                <input type="text" name="stok" id="stok" value="{{$product->stocks}}" class="form-control input-sm" style="width:80PX;margin-right:5px;" readonly>  
            </td>           
            <td>Total 
                <input type="text" name="total" id="total" class="form-control input-sm" value="0" required>  
            </td>
	    </tr>
    </tbody>	
</table>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
    function qty(e) {
    if (!/^[0-9]+$/.test(e.value)) {
        e.value = e.value.substring(0,e.value.length-1);
     }
    }

</script>

<script type="text/javascript">
    $(document).ready(function(){        
        $("#qty").focus();                 
        $("#qty").keypress(function(e){
        if(e.which==13){
            $("#total").focus();
        }

        });
        $("#qty").keyup(function(){
        var harga  = parseInt($("#price").val());
        var qty  = parseInt($("#qty").val());
        var total = harga*qty;
        if(isNaN(total)){
            total = 0;
        }
        else{
            total
        }
        
        // var total = harga - (harga*(diskon/100));
        $("#total").val(total);
      });
    });    
</script>
<script>
$(document).ready(function(){
   var tanpa_rupiah = document.getElementById('total');
	
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