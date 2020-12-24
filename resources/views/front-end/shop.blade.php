@extends('front-end.layouts.master')

@section('title')
    <title>Clothes Store</title>
@endsection

@section('content')
	<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
					<ul class="short">
						<li>
							<a href="{{route('trang-chu')}}">Trang chủ</a>
							<i>|</i>
						</li>
						<li>Shop</li>
					</ul>
				</div>
			</div>
		</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3">{{$catename->name}}</h3>
					<div class="row">
						<!-- product left -->
						<div class="side-bar col-lg-3">
							<div class="search-hotel">
								<h3 class="agileits-sear-head">Tìm kiếm</h3>
								<form action="{{route('search')}}" method="post">
									@csrf
										<input class="form-control" type="search" name="search" placeholder="Nhập từ khóa..." required="">
										<button class="btn1">
												<i class="fas fa-search"></i>
										</button>
										<div class="clearfix"> </div>
									</form>
							</div>
							<!-- deals -->
							<div class="deal-leftmk left-side">
								<h3 class="agileits-sear-head">Hàng đẹp giá rẻ</h3>
								@foreach($productmin as $min)
								<div class="special-sec1">
									<div class="img-deals">
										<img src="{{asset($min->productImage->path)}}" alt="">
									</div>
									<div class="img-deal1">
										<h3><a href="{{route('detail', $min->id)}}">{{$min->name}}</a></h3>
										<a href="{{route('detail', $min->id)}}">{{number_format("$min->price",0,"",".")}} VNĐ</a>
									</div>
									<div class="clearfix"></div>
								</div>
								@endforeach
							</div>
							<!-- //deals -->
						</div>
						<!-- //product left -->
						<!--/product right-->
						<div class="left-ads-display col-lg-9">
							<div class="wrapper_top_shop">
								<div class="row">
										<div class="col-md-6 shop_left">
												<img src="{{asset('web/images/banner4.jpg')}}" alt="">
											</div>
											<div class="col-md-6 shop_right">
												<img src="{{asset('web/images/banner4.jpg')}}" alt="">
											</div>
								<div class="row">
									<!-- /womens -->
									@foreach($products as $product)
									<div class="col-md-3 product-men women_two shop-gd">
										<div class="product-googles-info googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="{{asset($product->productImage->path)}}" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="{{route('detail', $product->id)}}" class="link-product-add-cart">Xem chi tiết</a>
														</div>
													</div>
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="{{route('detail', $product->id)}}">{{$product->name}}</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">{{number_format("$product->price",0,"",".")}} VNĐ</span>
																</div>
															</div>
														</div>
														<div class="googles single-item hvr-outline-out">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Farenheit">
																<input type="hidden" name="amount" value="575.00">
																<button data-id="{{$product->id}}" type="submit" class="googles-cart pgoogles-cart btn-add-to-cart" >
																	<i class="fas fa-cart-plus"></i>
																</button>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<!--//product right-->
					</div>
				</div>
				<div class="slider-img mid-sec mt-lg-5 mt-2">
						<!--//banner-sec-->
						<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Sản phẩm nổi bật</h3>
						<div class="mid-slider">
							<div class="owl-carousel owl-theme row">
								@foreach($enabled as $ena)
								<div class="item">
									<div class="gd-box-info text-center">
										<div class="product-men women_two bot-gd">
											<div class="product-googles-info slide-img googles">
												<div class="men-pro-item">
													<div class="men-thumb-item">
														<img src="{{asset($ena->productImage->path)}}" class="img-fluid" alt="">
														<div class="men-cart-pro">
															<div class="inner-men-cart-pro">
																<a href="{{route('detail', $product->id)}}" class="link-product-add-cart">Quick View</a>
															</div>
														</div>
														<span class="product-new-top">New</span>
													</div>
													<div class="item-info-product">
														<div class="info-product-price">
															<div class="grid_meta">
																<div class="product_price">
																	<h4>
																		<a href="single.html">{{$ena->name}}</a>
																	</h4>
																	<div class="grid-price mt-2">
																		<span class="money ">{{number_format("$ena->price",0,"",".")}} VNĐ</span>
																	</div>
																</div>
															</div>
															<div class="googles single-item hvr-outline-out">
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="googles_item" value="Fastrack Aviator">
																	<input type="hidden" name="amount" value="325.00">
																	<button type="submit" data-id="{{$ena->id}}" class="googles-cart pgoogles-cart btn-add-to-cart">
																		<i class="fas fa-cart-plus"></i>
																	</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
			</div>
		</section>
@endsection