@extends('master')
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
                    
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Manage <b>Tasks</b></h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <a onclick="event.preventDefault();addTaskForm();" href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Task</span></a>                       
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Task</th>
                                            <th>Created At</th>
                                            <th>Description</th>
                                            <th>Done</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$task->id}}</td>
                                            <td>{{$task->task}}</td>
                                            <td>{{$task->created_at}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{($task->done) ? 'Yes' : 'No'}}</td>
                                            <td>
                                                <a onclick="event.preventDefault();editTaskForm({{$task->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$task->id}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                <a onclick="event.preventDefault();deleteTaskForm({{$task->id}});" href="#" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>{{$tasks->count()}}</b> out of <b>{{$tasks->total()}}</b> entries</div>
                                    {{ $tasks->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
    @include('test.add')
    @include('test.edit')
    @include('test.delete')
@endsection
<!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->

<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>