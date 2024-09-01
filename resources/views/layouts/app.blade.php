<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	{{-- <title>@yield('title')</title> --}}
	<title>{{ $setting->logo_title ?? '' }}</title>
	<link rel="icon" type="image/x-icon" href="{{ asset($setting->favicon ?? '') }}">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset("assets/images/favicon.png") }}">
	<link href="{{ asset("backend-assets/vendor/jquery-nice-select/css/nice-select.css") }}" rel="stylesheet">
	<link href="{{ asset("backend-assets/vendor/owl-carousel/owl.carousel.css") }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset("backend-assets/vendor/nouislider/nouislider.min.css") }}">
	{{-- TABLER ICON --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Datatable -->
    <link href="{{ asset("backend-assets/vendor/datatables/css/jquery.dataTables.min.css") }}" rel="stylesheet">

	<!-- Toastr -->
    <link rel="stylesheet" href="{{ asset("backend-assets/vendor/toastr/css/toastr.min.css") }}">

	<link href="{{ asset("backend-assets/vendor/sweetalert2/dist/sweetalert2.min.css") }}" rel="stylesheet">

	<!-- Style css -->
    <link href="{{ asset("backend-assets/css/style.css") }}" rel="stylesheet">
    @yield('styles')
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include("layouts.components.navbar")
        @include("layouts.components.sidebar")


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield("content")
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        
        @include("layouts.components.footer")
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset("backend-assets/vendor/global/global.min.js") }}"></script>
	<script src="{{ asset("backend-assets/vendor/chart.js/Chart.bundle.min.js") }}"></script>
	<script src="{{ asset("backend-assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js") }}"></script>
	
	<!-- Datatable -->
    <script src="{{ asset("backend-assets/vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("backend-assets/js/plugins-init/datatables.init.js") }}"></script>

	<!-- Apex Chart -->
	<script src="{{ asset("backend-assets/vendor/apexchart/apexchart.js") }}"></script>
	
	<script src="{{ asset("backend-assets/vendor/chart.js/Chart.bundle.min.js") }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset("backend-assets/vendor/peity/jquery.peity.min.js") }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset("backend-assets/js/dashboard/dashboard-1.js") }}"></script>
	
	<script src="{{ asset("backend-assets/vendor/owl-carousel/owl.carousel.js") }}"></script>
	
    <script src="{{ asset("backend-assets/js/custom.min.js") }}"></script>
	<script src="{{ asset("backend-assets/js/dlabnav-init.js") }}"></script>
	<script src="{{ asset("backend-assets/js/demo.js") }}"></script>
    <script src="{{ asset("backend-assets/js/styleSwitcher.js") }}"></script>

	<!-- Toastr -->
    <script src="{{ asset("backend-assets/vendor/toastr/js/toastr.min.js") }}"></script>

	<script src="{{ asset("backend-assets/vendor/sweetalert2/dist/sweetalert2.min.js") }}"></script>
    <script src="{{ asset("backend-assets/js/plugins-init/sweetalert.init.js") }}"></script>

	
	@yield('script')

	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>
</body>
</html>