  
<!-- Add Task Modal Form HTML -->
<div class="modal" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addForm">
            <!-- {{csrf_field() }} {{ method_field('POST') }} -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add New Task
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                    
                    <div class="form-group">
                        <label>
                            Code
                        </label>
                        <input class="form-control" id="code" name="code" readonly value={{$cscode}} type="text">
                    </div>

                    <div class="form-group">
                        <label>
                            Name
                        </label>
                        <input class="form-control" id="name" name="name" type="text" autofocus required> 
                        <span class="help-block with errors0"></span>
                    </div>

                    <div class="form-group">
                        <label>
                            Phone
                        </label>
                        <input class="form-control" id="phone" name="phone" required type="text">
                        <span class="help-block with errors0"></span>
                    </div>

                    <div class="form-group">
                        <label>
                            Address
                        </label>
                        <input class="form-control" id="address" name="address" required="" type="text">
                        <span class="help-block with errors0"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" id="btn-add" class="btn btn-primary">Insert</button> -->
                    <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="btn-add" type="button" value="add">
                            Insert
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