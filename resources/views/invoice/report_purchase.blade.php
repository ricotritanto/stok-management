@extends('layouts.admin')
​
@section('title')
    <title>StartCCTV</title>
@endsection
​
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Laporan Order</li>
    </ol>
     <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Search by Date
                            </h4>
                        </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form class="form-horizontal" action="{{route('invoice.purchase')}}" method="GET">
                             @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Facture</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="facture" name="facture" placeholder="Facture">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Suplier</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="suplier" name="suplier" placeholder="suplier">
                                </div>
                              </div>
                                    <button type="submit" id="search" class="btn btn-info">Search</button>
                            </div>
                              
                           
                          </form>
                        </div>
                          <!-- /.card-body -->
                    </div>
        


                    <div class="col-md-4">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Search By date</h3>
                          </div>
                          <form class="form-horizontal" action="{{route('invoice.purchase')}}" method="GET">
                             @csrf
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
                            <button type="submit" class="btn btn-warning" id="btn">Search</button>
                        </div>
                        </form>
                    </div>


                </div>

                <div class="table-responsive">
                     @if(isset($datane))
                    <table class="table table-hover" id="aa">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Date</td>
                                <td>Facture</td>
                                <td>Suplier</td>
                                <td>Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="tampilane">
                            @php $no = 1; @endphp
                            @foreach($datane as $key)
                            <tr>
                                <td>{{$no++}} . </td>
                                <td>{{$key->date}}</td>
                                <td>{{$key->purchase_facture}}</td>
                                <td>{{$key->suplier_name}}</td>
                                <td>{{number_format($key->total,0,".",".")}}</td>
                                
                                <td><a href="{{route('invoice.print_purchase', $key->purchase_facture) }}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
                                <a href="{{ route('invoice.inchase', $key->purchase_facture) }}" target="_blank" class="btn btn-warning"><i class="fa fa-book"></i>Details</a>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                                    
                    </table>
                     @endif
                </div>

            </div>
        </section>
    </div>
</div>
</main>
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
