<!DOCTYPE html>
<html lang="en">
<head>
	@include('back-end.layouts.header')
</head>
<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Side Bar -->
		@include('back-end.layouts.sidebar')

		<!-- Content Wrapper -->
    	<div id="content-wrapper" class="d-flex flex-column">

      		<!-- Main Content -->
      		<div id="content">

      			<!-- Topbar -->
      			@include('back-end.layouts.topbar')
				
      			<!-- Begin Page Content -->
		        <div class="container-fluid">
		        	@yield('content')
		        </div>
      		</div>

      		<!-- Footer -->
      		@include('back-end.layouts.footer')
      	</div>
  	</div>

 	<!-- Logout Modal-->
 	@include('back-end.layouts.logout-modal')

 	<!-- Script -->
 	@include('back-end.layouts.script')
</body>
</html>