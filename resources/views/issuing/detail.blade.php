
<table>
    <thead>
        <tr>
           
        </tr>
    </thead>
    <tbody>
    	<tr>
            <input type="hidden" name="idpro" id="idpro" value="{{$product->id}}">
            <td>Product Code 
                <input type="text" name="code" id="code" value="{{$product->product_kode}}" style="width:100PX;margin-right:5px;" class="form-control input-sm" readonly>
            </td>
            <td>Product Name
                <input type="text" name="proname" id="proname" value="{{$product->product_name}}" style="width:100PX;margin-right:5px;" class="form-control input-sm" readonly>   
            </td>
            <td>Price
                <input type="text" name="price" id="price" value="{{$product->sell_price}}" style="width:100PX;margin-right:5px;" class="form-control input-sm" readonly>    
            </td>
            <td>Qty
                <input type="text" name="qty" id="qty" class="form-control input-sm" required>  
            </td>
            <td>Diskon%
                <input type="text" name="disc" id="disc" class="form-control input-sm" required>  
            </td>
            <td>PPN % 
                <input type="text" name="ppn" id="ppn" class="form-control input-sm" required>  
            </td>
            <td>Total 
                <input type="text" name="total" id="total" class="form-control input-sm" required>  
            </td>
	    </tr>
    </tbody>	
</table>