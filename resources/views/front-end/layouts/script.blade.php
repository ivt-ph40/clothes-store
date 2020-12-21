<!--jQuery-->
	<script src="{{asset('web/js/jquery-2.2.3.min.js')}}"></script>
	<script src="{{asset('web/js/toastr.min.js')}}"></script>
	<!-- newsletter modal -->
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	<script src="{{asset('web/js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{asset('web/js/classie-search.js')}}"></script>
	<script src="{{asset('web/js/demo1-search.js')}}"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="{{asset('web/js/minicart.js')}}"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- Count-down -->
	<link href="{{asset('web/css/simplyCountdown.css')}}" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	<script src="{{asset('web/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
  <script src="{{asset('web/js/move-top.js')}}"></script>
    <script src="{{asset('web/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->
    <script src="{{asset('web/js/easy-responsive-tabs.js')}}"></script>

	<script src="{{asset('web/js/bootstrap.js')}}"></script>
	<!-- js file -->
	<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
	</script>


	<script>	
	
		var url = '{{asset('')}}';
		$('.btn-add-to-cart').on('click', function(){
		    var product_id = $(this).attr('data-id');
		    var quantity = $('input[name=quantity]').length > 0 ?  $('input[name=quantity]').val() : 1;
		    var size_id = $('input[name=size]:checked').val();
		    var size_name = $('input[name=size]:checked').data('name');
		    $.ajaxSetup({
			   	headers: {
			     	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   		}
		 	});

			$.ajax({
				/* the route pointing to the post function */
				url: '{{route('addCart')}}',
				type: 'post',
				/* send the csrf-token and the input to the controller */
				data: {product_id: product_id, quantity: quantity, size_id:size_id, size_name:size_name},
				// remind that 'data' is the response of the AjaxController
				success: function (data) {
					if (data.status) {
						var image = url + data.data.options.image;
						var price = (data.data.price * data.data.qty).toLocaleString('vi') + ' VNĐ';
	     				var html = '<li id="row-id'+data.data.rowId+'" class="sbmincart-item"><div class="sbmincart-details-img"> <img src="'+image+'" class="img-fluid" alt=""></div><div class="sbmincart-details-name"> <a class="sbmincart-name" href="">'+data.data.name+'</a>                 <ul class="sbmincart-attributes">                                                                           </ul> </div> <div class="sbmincart-details-quantity"><input class="sbmincart-quantity" readonly data-sbmincart-idx="0" name="quantity_1" type="text" pattern="[0-9]*" value="'+data.data.qty+'" autocomplete="off">             </div><div class="sbmincart-details-remove"> <button type="button" class="sbmincart-remove"  data-rowid="'+data.data.rowId+'" data-sbmincart-idx="0">×</button> </div><div class="sbmincart-details-price">  <span class="sbmincart-price">'+price+'</span>              </div></li>';
	                 	if ($('li#row-id'+data.data.rowId) .length > 0 ) {
	                 		// console.log($('li#row-id'+data.data.rowId).find('input[name=quantity_1]'));return;
	                 		$('li#row-id'+data.data.rowId).find('input.sbmincart-quantity').val(data.data.qty);
	                 		$('li#row-id'+data.data.rowId).find('span.sbmincart-price').text(price)

	                 	} else {
	                 		$('#ul-carts').append(html);
	                 	}
	                 	$('span#total-cart').text(data.total + 
	                 		'VND');
	                 	toastr.success('Thêm giỏ hàng thành công');
	                 	$('#staplesbmincart').show();
					}
					
				 
				}
			});
		})
	</script>

	<script>
		$(document).ready(function(){
		 	$(".qtybutton").on("click", function() {
		      var $button = $(this);
		      var oldValue = $button.parent().find("span.quantity").text();
		      var rowId = $button.parent().find('input').val();
		      if ($button.hasClass("value-plus")) {
		        var newVal = parseFloat(oldValue) + 1;
		      } else {
		         // Don't allow decrementing below zero
		        if (oldValue > 1) {
		       		var newVal = parseFloat(oldValue) - 1;
		       	} else {
		       		newVal = 1;
		        }
	    	}
	      	$button.parent().find("span.quantity").text(newVal);
	      	$.ajaxSetup({
			   	headers: {
			     	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   		}
	 		});

			$.ajax({
				/* the route pointing to the post function */
				url: '{{route('updateCart')}}',
				type: 'post',
				/* send the csrf-token and the input to the controller */
				data: {rowId: rowId, quantity: newVal},
				// remind that 'data' is the response of the AjaxController
				success: function (data) {
			 		if (data.status) {
					 	$('span#total-cart').text(data.total + 'VND');
				 	}
				}
			});


	     });
		$(document).on('click', '.sbmincart-closer', function(){
			$('#staplesbmincart').hide();
		})
		$(document).on('click' , '.sbmincart-remove', function(){
			var rowId = $(this).attr('data-rowid');
			$.ajaxSetup({
			   	headers: {
			     	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   		}
	 		});

			$.ajax({
				/* the route pointing to the post function */
				url: '{{route('removeCart')}}',
				type: 'post',
				/* send the csrf-token and the input to the controller */
				data: {rowId: rowId},
				// remind that 'data' is the response of the AjaxController
				success: function (data) {
					console.log(data);
				 	if (data.status) {
				 		if ($('li#row-id'+data.rowId).length > 0 ) {
					 		$('li#row-id' + data.rowId).remove();
				 		}

				 		if ($('tr#row-id'+data.rowId).length > 0 ) {
					 		$('tr#row-id' + data.rowId).remove();
				 		}

				 		if(data.count == 0) {
			 			 	var html = '<tr>\n' +
									    '<td colspan="6">Không có sản phẩm nào trong giỏ hàng</td>\n' +
									    '</tr>';
					    	$('#tbody-content').html(html);

				 		}

					 	$('span#total-cart').text(data.total + 
		                 		'VND');
	                 	toastr.success('Xóa sản phẩm thành công');

				 	}
				}
			});
		});
	})
		
	</script>