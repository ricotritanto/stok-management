  
<!-- Add Task Modal Form HTML -->
<div class="modal" id="edit-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditCs">
            <!-- {{csrf_field() }} {{ method_field('PUT') }} -->
            <!-- @csrf -->
            <!-- <input type="hidden" name="_method" value="PUT"> -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Update Brand
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label>
                            Brand Name
                        </label>
                        <input class="form-control" id="brand" name="brand" type="text"  autofocus required> 
                        <span class="help-block with errors0"></span>
                    </div>
                </div>
                <div class="modal-footer">
                <input id="id" name="id" type="hidden" value="0">
                    <!-- <button type="submit" id="btn-edit" class="btn btn-primary">Update</button>
                    <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                      <button class="btn btn-info" id="btn-edit" type="button" value="add">
                            Update
                        </button>
                        <span class="help-block with errors0"></span>
                </div>
            </form>
        </div>
    </div>
</div>
</form>