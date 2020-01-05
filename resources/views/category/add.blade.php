  
<!-- Add Task Modal Form HTML -->
<div class="modal" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addForm">
                <div class="modal-header">
                    <h4 class="modal-title">
                        New Category
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="add-error-bag">
                        <ul id="add-task-errors">
                        </ul>
                    </div>
                        <input type="hidden" id="id" name="id">
                    
                    <div class="form-group">
                        <label>
                            Category
                        </label>
                        <input class="form-control" id="category" name="category" type="text" autofocus required> 
                        <span class="help-block with errors0"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="btn-add" name="btn-add" type="button" value="add">
                            Insert
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
