	@yield('title')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	{{-- <link href="{{asset('web/css/bootstrap.css')}}" rel='stylesheet' type='text/css' /> --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="{{asset('web/css/login_overlay.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/style6.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('web/css/shop.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('web/css/owl.carousel.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('web/css/owl.theme.css')}}" type="text/css" media="all">
	<link href="{{asset('web/css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/contact.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/checkout.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/toastr.min.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('web/css/fontawesome-all.css')}}" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">