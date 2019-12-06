
<!-- Add Task Modal Form HTML -->
<div class="modal" id="modal-print">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <form id="nota" action="{{ route('issuing.pdf')}}" method="Post">
            <!-- {{csrf_field() }} {{ method_field('POST') }} -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Invoice Penjualan
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                                    
                           
                
                <div class="modal-body">
                        <input type="hidden" id="id" name="id">                 

                    <div class="form-group">
                        <label>
                            No Fakture
                        </label>
                        <input class="form-control" id="facture" name="facture" type="text" value="{!! session('facture') !!}"autofocus required> 
                        <span class="help-block with errors0"></span>
                    </div>
                    <div class="form-group">
                        <label>
                            Total Transaksi
                        </label>
                        <input class="form-control" id="grandtot" name="grandtot" value="{!! session('grandtot') !!}" required type="text" color="RED">
                        <span class="help-block with errors0"></span>
                    </div>

                    <div class="form-group">
                        <label>
                            Cash
                        </label>
                        <input class="form-control" id="cash" name="cash" required="" type="text" value="{!! session('bayar') !!}">
                        <span class="help-block with errors0"></span>
                    </div>
                    <div class="form-group">
                        <label>
                            Kembali
                        </label>
                        <input class="form-control" id="kembali" name="kembali" required="" type="text" value="{!! session('kembali') !!}">
                        <span class="help-block with errors0"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" id="btn-add" class="btn btn-primary">Insert</button> -->
                    <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="btn-add" name="btn-add" type="submit" value="add">
                            Print
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