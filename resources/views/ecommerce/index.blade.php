@extends('layouts.ecommerce')

@section('title')
    <title>StarCCTV</title>
@endsection

@section('content')
@include('layouts.ecommerce.module.navigation')
@include('layouts.ecommerce.module.banner')

<!-- for bootstrap working -->
	<!-- //for bootstrap working -->
	<!-- header modal -->
	<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<!-- <h4 class="modal-title" id="myModalLabel">PROMO !!!</h4> -->
					<img src="{{asset('public/ecommerce/thema-b/images/prom.jpg')}}" alt=" " class="img-responsive" />		
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-12 modal_body_left modal_body_left1" style="border-right: 0px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<img src="{{asset('public/ecommerce/thema-b/images/promo.jpg')}}" alt=" " class="img-responsive" />				            	      
								</div>	
							</div>
							<script src="{{ asset('public/ecommerce/thema-b/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
							<!-- <div id="OR" class="hidden-xs">Or</div> -->
						</div>
						<!-- <div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">Hubungi Kami</h3>
									<img src="{{asset('ecommerce/thema-b/images/whatsapp.jpg')}}" alt=" " class="img-responsive" />
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#myModal88').modal('show');
	</script>  


@include('layouts.ecommerce.module.brands')
@endsection