@extends('layouts.master')
​
@section('title')
    <title>Manajemen Customer</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                                <a onclick="event.preventDefault();addTaskForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Customer</span></a>  
                             </div>
                            @endslot
                            
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif   
                            
                            <div class="table-responsive">
                                <table id="customer-table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>                                            
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @forelse($customer as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->customer_code}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->updated_at}}</td>
                                            <td>
                                                <!-- <form action="{{ route('customer.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE"> -->
                                                    <!-- <a href="{{ route('customer.edit', $row->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a> -->
                                                    <a onclick="event.preventDefault();editform({{$row->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$row->id}}"> <i class="fa fa-edit"></i></a>
                                                    <a onclick="event.preventDefault();deleteTaskForm({{$row->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$row->id}}"> <i class="fa fa-trash"></i></a>
                                                    <!-- <a onclick="editform('.$row->id.')" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> -->
                                                    <!-- <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form> -->
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">DATA EMPTY</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                    <div class="clearfix">
                                        <div class="hint-text">Showing <b>{{$customer->count()}}</b> out of <b>{{$customer->total()}}</b> entries</div>
                                        {{ $customer->links() }}
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
    @include('customer.cs_add')
    @include('customer.cs_edit')
    @include('customer.cs_delete')
  
   
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
            url: "{{route('customer.store')}}",
            data: {
                code: $("#modal-form input[name=code]").val(),
                name: $("#modal-form input[name=name]").val(),
                phone: $("#modal-form input[name=phone]").val(),
                address: $("#modal-form input[name=address]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#modal-form').trigger("reset");
                $("#modal-form .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
                // var errors = $.parseJSON(data.responseText);
                // $('#add-task-errors').html('ERORR BONG');
                // $.each(errors.messages, function(key, value) {
                //     $('#add-task-errors').append('<li>' + value + '</li>');
                // });
                // $("#add-error-bag").show();
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
            url: '/customer/' + $("#edit-form input[name=id]").val(),
            data: {
                code: $("#frmEditCs input[name=code]").val(),
                name: $("#frmEditCs input[name=name]").val(),
                phone: $("#frmEditCs input[name=phone]").val(),
                address: $("#frmEditCs input[name=address]").val(),
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
            url: '{{URL::to('/customer/ ')}}' + $("#frmDeleteTask input[name=id]").val(),
            dataType: 'json',
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
         url: '{{URL::to('/customer/ ')}}' + id, //digunakan url ini saat tidak menggunakan artisan//
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditCs input[name=code]").val(data.customer.customer_code);
            $("#frmEditCs input[name=name]").val(data.customer.name);
            $("#frmEditCs input[name=phone]").val(data.customer.phone);
            $("#frmEditCs input[name=address]").val(data.customer.address);
            $("#frmEditCs input[name=id]").val(data.customer.id);
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
        url: '{{URL::to('/customer/ ')}}' + id, 
        dataType:'json',
        success: function(data) {
            console.log(data);
            $("#frmDeleteTask #delete-title").html("Delete Customer  (" + data.customer.name + ")?");
            $("#frmDeleteTask input[name=id]").val(data.customer.id);
            $('#deleteTaskModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>



