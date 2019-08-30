  
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
                        <input class="form-control" id="susuke" name="susuke"  type="text">
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
        var grandtot  = parseInt($("#grandtot").val());
        var bayar  = parseInt($("#bayar").val());
        var susuke = bayar-grandtot;
        
        // var total = harga - (harga*(diskon/100));
        $("#susuke").val(susuke);
      });
    });    
</script>