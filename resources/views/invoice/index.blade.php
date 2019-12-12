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
                        <h1 class="m-0 text-dark">Report Issuing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report Is</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-6">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Search</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form class="form-horizontal">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Facture</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="facture" name="facture" placeholder="Facture">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Customer</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer">
                                </div>
                              </div>
                                    <button type="submit" class="btn btn-info">Search</button>
                            </div>
                              
                           
                          </form>
                        </div>
                          <!-- /.card-body -->
                    </div>
        


                    <div class="col-md-4">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Seach By date</h3>
                          </div>
                          <div class="card-body">
                            <!-- Date range -->
                            <div class="form-group">
                              <label>From Date:</label>

                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" id="date1" name="date1">
                              </div>
                              <!-- /.input group -->
                            </div>  
                            <div class="form-group">
                              <label>To Date:</label>

                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" id="date2" name="date2">
                              </div>
                              <!-- /.input group -->
                            </div>
                            <button class="btn btn-warning">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.3-3-1.min.js') }}"></script>
<script src="{{ asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script>
 $(function () {
   $( "#date1").datepicker({
    format: "dd-mm-yyyy",
    weekStart: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    rtl: true,
    orientation: "auto"
    });
   $( "#date2").datepicker({
    format: "dd-mm-yyyy",
    weekStart: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    rtl: true,
    orientation: "auto"
    });
  })
</script>