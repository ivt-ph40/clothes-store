<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title></title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-md-6">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><b>Đăng ký</b></h1>
									</div>
									<form class="user" action="{{route('register')}}" method="POST">
										@csrf
										
										<div class="form-group">
											@if(!$errors->has('name'))
											<input type="text" name="name" id="name" class="form-control form-control-user" id="" aria-describedby="" placeholder="Nhập tên của bạn" value="{{old('name')}}">
											@else
											<input type="text" name="name" id="name" class="form-control form-control-user is-invalid" id="" aria-describedby="" placeholder="Nhập tên của bạn" value="{{old('name')}}">
											<p class="invalid-feedback ml-3">{{$errors->first('name')}}</p>
											@endif
                                        </div>
                                        <div class="form-group">
											@if(!$errors->has('email'))
											<input type="email" name="email" id="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email" value="{{old('email')}}">
											@else
											<input type="email" name="email" id="email" class="form-control form-control-user is-invalid" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email" value="{{old('email')}}">
											<p class="invalid-feedback ml-3">{{$errors->first('email')}}</p>
											@endif
										</div>
										<div class="form-group">
											@if(!$errors->has('password'))
											<input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Nhập mật khẩu">
											@else
											<input type="password" name="password" id="password" class="form-control form-control-user is-invalid" placeholder="Nhập mật khẩu">
												<p class="invalid-feedback ml-3">{{$errors->first('password')}}</p>
											@endif
										</div>
										<div class="form-group">
											<input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-user" placeholder="Nhập lại mật khẩu">
										</div>
										{{-- <div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
												<label class="custom-control-label" for="customCheck">Ghi nhớ tôi</label>
											</div>
										</div> --}}
										<button class="btn btn-primary btn-user btn-block" type="submit">
											Đăng ký
										</button>
										<!-- <hr>
										<a href="#" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
										</a>
										<a href="#" class="btn btn-facebook btn-user btn-block">
											<i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
										</a> -->
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="{{route('login')}}">Đăng nhập</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	<!-- Core plugin JavaScript-->
	<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
