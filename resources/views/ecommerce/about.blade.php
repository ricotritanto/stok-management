@extends('layouts.ecommerce')

@section('title')
	<title>About Us</title>
@endsection

@section('content')
@include('layouts.ecommerce.module.navigation')
<!-- banner -->
<div class="banner banner10">
		<div class="container">
			<h2>About Us</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>About</li>
			</ul>
		</div>
	</div>
    <!-- //breadcrumbs -->  

    <!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-6 w3ls_about_grid_left">
					<p>Di era modern saat ini dan tindakan kejahatan yang semakin meningkat membuat kami bergerak untuk memberi solusi keamanan di masyarakat.
					</p>
					<div class="col-xs-2 w3ls_about_grid_left1">
						<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 w3ls_about_grid_left2">
						<p>STARCCTV sebagai salah satu pusat CCTV di Semarang berdiri dengan tujuan memenuhi kebutuhan teknologi keamanan di masyarakat. Dengan menerapkan standar High Quality Product serta memiliki teknisi handal yang berpengalaman dibidang solusi keamanan dan teknologi, membuat kami percaya
						 bahwa seiring berjalannya waktu STARCCTV.ID akan bertumbuh dan berkembang dengan mengedepankan unsur teknologi terbaru dibidangnya. </p>
					</div>
					<div class="clearfix"> </div>
					<div class="col-xs-2 w3ls_about_grid_left1">
						<span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 w3ls_about_grid_left2">
						<p>Sekarang ini STARCCTV telah berkembang dan memiliki beberapa client terutama wilayah kota Semarang.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 w3ls_about_grid_right">
					<img src="{{ asset('ecommerce/thema-b/images/52.jpg')}}" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about --> 
	<!-- team -->
	<div class="team">
		<div class="container">
			<h3>Meet Our Team</h3>
			<div class="wthree_team_grids">
				<div class="col-md-3 wthree_team_grid">
					<img src="{{ asset('ecommerce/thema-b/images/t4.png')}}" alt=" " class="img-responsive" />
					<h4>Smith Allen <span>Manager</span></h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<img src="{{ asset('ecommerce/thema-b/images/t5.png')}}" alt=" " class="img-responsive" />
					<h4>Laura James <span>Designer</span></h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<img src="{{ asset('ecommerce/thema-b/images/t6.png')}}" alt=" " class="img-responsive" />
					<h4>Crisp Doe <span>Director</span></h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wthree_team_grid">
					<img src="{{ asset('ecommerce/thema-b/images/t7.png')}}" alt=" " class="img-responsive" />
					<h4>Linda Rosy <span>Quality Checker</span></h4>
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
				<p>I have an idea of who I want to be, I have a vision of my own success.
					– A. P. J. Abdul Kalam
				</p>
			</div>
		</div>
	</div>
    <!-- //team -->
    

    @endsection