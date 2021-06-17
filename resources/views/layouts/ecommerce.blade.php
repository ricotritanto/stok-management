<!DOCTYPE html>
<html lang="en">
<head>
<title>Jasa Pemasangan CCTV</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CCTV Semarang, CCTV Indonesia,cctv hikvision, camera,ip camera, Harddisk HDD, Kabel data, DVR NVR" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="{{ asset('ecommerce/thema-b/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('ecommerce/thema-b/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('ecommerce/thema-b/css/fasthover.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('ecommerce/thema-b/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="{{ asset('ecommerce/thema-b/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ asset('ecommerce/thema-b/js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('ecommerce/thema-b/css/jquery.countdown.css')}}" /> <!-- countdown -->
<!-- //js -->
<!-- web fonts -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts -->
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
</head>
<body>
<script type="text/javascript" src="{{ asset('ecommerce/thema-b/js/bootstrap-3.1.1.min.js')}}"></script>
	<!-- header modal -->
	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			<div class="w3l_logo">
				<h1><a href="index.html">StarCCTV<span>Your stores. Your place.</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="{{ route('front.product') }}" method="get">
						<input type="text" name="q" placeholder="Search..." value="{{ request()->q }}">
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
			<!-- <div class="cart cart box_1">
				<form action="#" method="post" class="last">
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>
			</div>   -->
		</div>
	</div>
    <!-- //header -->
    @yield('content')

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Ngemplak Barat III No 17<span>Tembalang, Semarang.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@starcctv.net</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(+62) 81 220 888 990</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info">
						<li><a href="{{ route('front.about') }}">About Us</a></li>
						<li><a href="{{ route('front.contact') }}">Contact Us</a></li>
						<li><a href="{{ route('front.faq') }}">FAQ's</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info">
						@foreach ($categories as $category)
						<li><a href="{{ route('front.product')}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info">
						<li><a href="{{url('/')}}">Home</a></li>
					</ul>
					<h4>Follow Us</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="#home1" class="scroll"><img src="{{ asset('ecommerce/thema-b/images/arrow.png')}}" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>&copy; 2017 Electronic Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<!-- cart-js -->
	<script src="{{ asset('ecommerce/thema-b/js/minicart.js')}}"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        		}
        	}
        });
    </script>
	<!-- //cart-js -->
</body>
</html>
