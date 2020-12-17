@extends('front-end.layouts.master')

@section('title')
	<title>Contact</title>
@endsection

@section('content')
	<div class="banner-top container-fluid" id="home">
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="{{route('trang-chu')}}">Home</a>
							<i>|</i>
						</li>
						<li>Contact Us</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3>
			<div class="inner_sec">
				<div class="address row">
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Address</h6>
								<p> California, USA</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Email</h6>
								<p>Email :
									<a href="mailto:example@email.com"> mail@example.com</a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Phone</h6>
								<p>+1 234 567 8901</p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="contact-map">
		<iframe src="https://www.google.com/maps/place/Da+Nang,+Vietnam/@16.0717635,107.9380394,11z/data=!3m1!4b1!4m5!3m4!1s0x314219c792252a13:0x1df0cb4b86727e06!8m2!3d16.0544563!4d108.0717219?hl=en-US"
		    class="map" style="border:0" allowfullscreen=""></iframe>
	</div>
@endsection