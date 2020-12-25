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
					<h3 class="tittle-w3layouts my-lg-4 mt-3">Tìm kiếm: {{$data}}</h3>
					<div class="row">
						<!--/product right-->
						<div class="left-ads-display col-lg-12">
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
									@foreach($search_products as $product)
									<div class="col-md-3 product-men women_two shop-gd" style="padding: 8px;">
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
																	<a href="single.html">{{$product->name}}</a>
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
																<button data-id="{{$product->id}}" type="submit" class="googles-cart pgoogles-cart btn-add-to-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>														</div>
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
			</div>
		</section>
@endsection