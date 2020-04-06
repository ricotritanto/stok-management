<table>
    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
    	<tr>
            <input type="hidden" name="idpro" id="idpro" value="{{$product->id}}">
            <td>Product
                <input type="text" name="proname" id="proname" value="{{$product->name}}" style="width:400px;margin-right:5px;" class="form-control input-sm" readonly></td>
            <td>Qty
                <input type="text" name="qty" id="qty" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
            <td>Price
                <input type="text" name="price" id="price" value="{{$product->purchase_price}}" style="width:100px;margin-right:5px;" class="form-control input-sm" readonly></td>
            <td>Total
                <input type="text" name="total" id="total" class="form-control input-sm" value="0" required> 
            </td>
            
	    </tr>
    </tbody>	
</table>

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
        
        // var total = harga - (harga*(diskon/100));
        $("#total").val(total);
      });
    });    
</script>