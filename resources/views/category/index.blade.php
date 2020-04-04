@extends('layouts.admin')
​
@section('title')
    <title>Manajemen Category</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @card
                            @slot('title')
                             <div class="col-sm-6">
                             <a onclick="event.preventDefault();addTaskForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add</span></a>
                             </div>
                            @endslot​                               
                                
                            <div class="table-responsive">
                                <table id="customer-table" class="table table-hover">                            
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td><strong>Category</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($category as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->category_name }}</td>
                                            <td>
                                                <a onclick="event.preventDefault();editform({{$row->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$row->id}}"> <i class="fa fa-edit"></i></a>
                                                <a onclick="event.preventDefault();deleteTaskForm({{$row->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$row->id}}"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                     <div class="clearfix">
                                        <div class="hint-text">Showing <b>{{$category->count()}}</b> out of <b>{{$category->total()}}</b> entries</div>
                                        {{ $category->links() }}
                                    </div>
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('category.add')
    @include('category.edit')
    @include('category.delete')
@endsection

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{URL::to('/category/store ')}}' ,
            data: {
                category: $("#modal-form input[name=category]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#modal-form').trigger("reset");
                $("#modal-form .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
                var errors = $.parseJSON(data.responseText);
                $('#add-task-errors').html('ERORR ');
                $.each(errors.messages, function(key, value) {
                    $('#add-task-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    $("#btn-edit").click(function() {
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/category/' + $("#edit-form input[name=id]").val(),
            data: {
                category: $("#frmEditCs input[name=category]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditCs').trigger("reset");
                $("#frmEditCs .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-task-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            // url: '/customer/' + $("#frmDeleteTask input[name=id]").val(),
            url: '/category/' + $("#frmDeleteTask input[name=id]").val(),
            dataType:'json',
            success: function(data) {
                $("#frmDeleteTask .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addTaskForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#modal-form').modal('show');
    });
}

function editform(id) {
    $.ajax({
        type: 'GET',
        // url: '/customer/' + id,
         url: '{{URL::to('/category/ ')}}' + id, //digunakan url ini saat tidak menggunakan artisan//
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditCs input[name=category]").val(data.category.category_name);
            $("#frmEditCs input[name=id]").val(data.category.id);
            $('#edit-form').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteTaskForm(id) {
    $.ajax({
        type: 'GET',
        // url: '/customer/' + id,
        url: '{{URL::to('/category/ ')}}' + id, 
        dataType:'json',
        success: function(data) {
            console.log(data);
            $("#frmDeleteTask #delete-title").html("Delete category  (" + data.category.category_name + ")?");
            $("#frmDeleteTask input[name=id]").val(data.category.id);
            $('#deleteTaskModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>