<table>
    <thead>
        <tr>
            <td>Product Name</td>
            <td>Qty</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    	<tr>
            <input type="hidden" name="idpro" id="idpro" value="{{$product->id}}">
            <td><input type="text" name="proname" id="proname" value="{{$product->product_name}}" style="width:400px;margin-right:5px;" class="form-control input-sm" readonly></td>
            <td><input type="text" name="qty" id="qty" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
            <!-- <td><button type="submit" id="btn" class="btn btn-sm btn-primary">Insert</button></td> -->
	    </tr>
    </tbody>	
</table>