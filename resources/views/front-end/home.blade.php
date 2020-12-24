@extends('front-end.layouts.master')

@section('title')
    <title>Clothes Store</title>
@endsection

@section('content')
	<div>
		<img src="{{asset('images/slide/2-slider_2.JPG')}}" style="height: 716px;" alt="">
	</div>


	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">Hàng mới về </h3>
				<div class="row mt-lg-3 mt-0">
					@foreach($products as $product)
					<div class="col-md-3 product-men women_two mt-lg-3 mt-0">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img src="{{asset($product->productImage->path)}}" class="img-fluid" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{route('detail', $product->id)}}" class="link-product-add-cart">xem chi tiết</a>
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
												<button type="submit" class="googles-cart pgoogles-cart btn-add-to-cart" data-id="{{$product->id}}">
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
				<h3 class="tittle-w3layouts my-lg-4 my-4">Sản phẩm nổi bật </h3>
				<div class="slider-img mid-sec">
					<!--//banner-sec-->
					<div class="mid-slider">
						<div class="owl-carousel owl-theme row">
							@foreach($trending as $trending)
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="{{asset($trending->productImage->path)}}" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="{{route('detail', $trending->id)}}" class="link-product-add-cart">Xem chi tiết</a>
														</div>
													</div>
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="{{route('detail', $trending->id)}}">{{$trending->name}}</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">{{number_format("$trending->price",0,"",".")}} VNĐ</span>
																</div>
															</div>
														</div>
														<div class="googles single-item hvr-outline-out">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Fastrack Aviator">
																<input type="hidden" name="amount" value="325.00">
																<button type="submit" class="googles-cart pgoogles-cart btn-add-to-cart" data-id="{{$product->id}}">
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
		</div>
	</section>
@endsection