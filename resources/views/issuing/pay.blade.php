  
<!-- Add Task Modal Form HTML -->
<div class="modal" id="pay-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="payForm">
            <!-- {{csrf_field() }} {{ method_field('POST') }} -->
                <div class="modal-header">
                    <h4 class="modal-title">
                       PAY FORM
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                    
                    <div class="form-group">
                        <label>
                            Total
                        </label>
                        <input class="form-control" id="grandtot" name="grandtot" readonly type="text">
                    </div>

                    <div class="form-group">
                        <label>
                            Bayar
                        </label>
                        <input class="form-control" id="bayar" name="bayar" type="text" required> 
                        <span class="help-block with errors0"></span>
                    </div>

                    <div class="form-group">
                        <label>
                            Kembalian
                        </label>
                        <input class="form-control" id="susuke" name="susuke" readonly type="text">
                        <span class="help-block with errors0"></span>
                    </div>

                  
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" id="btn-add" class="btn btn-primary">Insert</button> -->
                    <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="btn-add" name="btn-add" type="button" value="add">
                            Save
                        </button>
                    <!-- <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel"> -->
                        <!-- <button class="btn btn-info" id="btn-add" type="submit" value="add">
                            Insert
                        </button> -->
                        <span class="help-block with errors0"></span>
                </div>
            </form>
        </div>
    </div>
</div>
</form>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){        
        $("#bayar").focus();      
        $("#bayar").keypress(function(e){
            if(e.which==13){
                $("#susuke").focus();
            }
        });
        $("#bayar").keyup(function(){
        var grandtot  = convertToAngka($("#grandtot").val());
        var bayar  = convertToAngka($("#bayar").val());
        var susuke = bayar-grandtot;
        
        // var total = harga - (harga*(diskon/100));
        var number_string = susuke.toString(), //merubah value tot ke string
        split   = number_string.split(','), // split dengan koma
        sisa    = split[0].length % 3, 
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        document.getElementById('susuke').value = rupiah; 
        // $("#susuke").val(susuke);
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