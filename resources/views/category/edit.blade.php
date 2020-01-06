 <!-- Add Task Modal Form HTML -->
<div class="modal" id="edit-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditCs">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Update Category
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                        <div class="alert alert-danger" id="edit-error-bag">
                            <ul id="edit-task-errors">
                        </ul>
                    </div>

                    <div class="form-group">
                        <label>
                            Category Name
                        </label>
                        <input class="form-control" id="category" name="category" type="text"  autofocus required=""> 
                    </div>
                </div>
                <div class="modal-footer">
                <input id="id" name="id" type="hidden" value="0">
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