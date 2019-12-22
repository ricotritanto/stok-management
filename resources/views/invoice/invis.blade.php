<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Report Invoice</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{asset('inv/css/bootstrap.css')}}" rel="stylesheet" />
      <!-- CUSTOM STYLE  -->
    <link href="{{asset('inv/css/custom-style.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href="{{asset('inv/css/font-css.css')}}" rel='stylesheet' type='text/css' />

</head>
<body>
 <div class="container">
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="{{asset('dist/img/logo2.png')}}" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   STARTCCTV </strong>
              <br />
                  <i>Address :</i> 245/908 , New York Lane,
              <br />
                  Forth Street , Semarang,
              <br />
                  Indonesia.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  startcctv@gmail.com
             </span>
             <span>
                 <strong>Call : </strong>  +81 - 890- 789- 9087 
             </span>
              <span>
                 <strong>Fax : </strong>  +02476-908- 890 
             </span>
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
        @forelse($datane as $abc)    
        
        @empty
        @endforelse
         <h4>  
            <strong>Client Information</strong></h4>
            <strong>  {{$abc->name}}  </strong>
                <br />
                    <b>Code :</b> {{$abc->customer_code}}
                <br />
                    <b>Address :</b> {{$abc->address}}
                <br />
                    <b>Phone :</b> {{$abc->phone}}
                <br />
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
              <h4>  <strong>Payment Details </strong></h4>
              <b>No Facture : {{$abc->issuing_facture}}</b>
              </br>
              <b>Bill Amount :  Rp {{$abc->grandtotal}} </b>
              <br />
               Bill Date :  {{$abc->date}}
              <br />
               Purchase Date :  {{$abc->date}}
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">            
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($datane as $abc)
                                <tr>
                                    <td>{{$no++ }}</td>
                                    <td>{{$abc->product_kode}}</td>
                                    <td>{{$abc->product_name}}</td>
                                    <td>{{$abc->brand_name}}</td>
                                    <td>{{$abc->qty}}</td>
                                    <td>Rp{{number_format($abc->sell_price,0,".",".")}}</td>
                                </tr> 
                                 @endforeach                               
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Amount :  Rp {{$abc->grandtotal}} </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : -  ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount :  Rp {{$abc->grandtotal}}</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.

                 </li>
                 <li>
                     Please read all terms and polices on  www.yourdomaon.com for returns, replacement and other issues.

                 </li>
             </ol>
             </div>
         </div>
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a href="#" class="btn btn-primary btn-lg" onclick="javascript:window.print();" data-abc="true">
                        <i class="fa fa-print">Print Invoice</a>
             &nbsp;&nbsp;&nbsp;
              <a href="{{route('invoice.download', $abc->issuing_facture) }}" target="_blank" class="btn btn-success btn-lg" >Download In Pdf</a>

             </div>
         </div>
 </div>

</body>
</html>
