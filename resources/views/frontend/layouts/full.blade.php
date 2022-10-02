<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


	<meta charset="utf-8"/>
	<title>@yield('title') / Маша-растеряша</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content=" "/>
	<meta name="keywords" content=""/>
	<meta content="" name=""/>

	<!-- App favicon -->
	<link rel="shortcut icon" href="/assets/images/favicon.ico">
	<!-- Choise Css -->
	<link rel="stylesheet" href="/assets/libs/choices.js/public/assets/styles/choices.min.css">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="/assets/libs/swiper/swiper-bundle.min.css">
	<!-- Bootstrap Css -->
	<link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
	<!-- Icons Css -->
	<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
	<!-- App Css-->
	<link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>
	<!--Custom Css-->
@yield('vendor-styles')

<!-- END: Page CSS-->
@yield('page-styles')
<!-- END: Page CSS-->

</head>

<body>


<!-- Begin page -->
<div>

	<!-- START TOP-BAR -->
@include('frontend.moduls.top-bar')
<!-- END TOP-BAR -->

	<!--Navbar Start-->
@include('frontend.moduls.navbar')
<!-- Navbar End -->

	<!-- START SIGN-UP MODAL -->
@include('frontend.moduls.modal')
<!-- START SIGN-UP MODAL -->


	<div class="main-content">

		<div class="page-content">
			@yield('content')
		</div>
		<!-- End Page-content -->


		<!-- START FOOTER -->
		<section class="bg-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="footer-item mt-4 mt-lg-0 me-lg-5">
							<h4 class="text-white mb-4">Маша-растеряша</h4>
							<p class="text-white-50">Поиск пропавших вещей</p>
							<p class="text-white mt-3">Подпишись на нас:</p>
							<ul class="footer-social-menu list-inline mb-0">
								<li class="list-inline-item"><a href="#"><i class="uil uil-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="uil uil-linkedin-alt"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="uil uil-google"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="uil uil-twitter"></i></a></li>
							</ul>
						</div>
					</div><!--end col-->
					<div class="col-lg-4 col-6">
						<div class="footer-item mt-4 mt-lg-0">
							<p class="fs-16 text-white mb-4">Точки продаж</p>
							<ul class="list-unstyled footer-list mb-0">
								<li><a href="about.html"><i class="mdi mdi-chevron-right"></i> г.Балашиха, Дмитриева, 31</a>
								</li>
								<li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> г.Балашиха, Дмитриева,
										32</a></li>
								<li><a href="services.html"><i class="mdi mdi-chevron-right"></i> г.Балашиха, Дмитриева,
										33</a></li>
							</ul>
						</div>
					</div><!--end col-->

					<div class="col-lg-2 col-6">
						<div class="footer-item mt-4 mt-lg-0">
							<p class="text-white fs-16 mb-4">For Candidates</p>
							<ul class="list-unstyled footer-list mb-0">
								<li><a href="candidate-list.html"><i class="mdi mdi-chevron-right"></i> Candidate
										List</a></li>
								<li><a href="candidate-grid.html"><i class="mdi mdi-chevron-right"></i> Candidate
										Grid</a></li>
								<li><a href="candidate-details.html"><i class="mdi mdi-chevron-right"></i> Candidate
										Details</a></li>
							</ul>
						</div>
					</div><!--end col-->
					<div class="col-lg-2 col-6">
						<div class="footer-item mt-4 mt-lg-0">
							<p class="fs-16 text-white mb-4">Support</p>
							<ul class="list-unstyled footer-list mb-0">
								<li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Help Center</a></li>
								<li><a href="faqs.html"><i class="mdi mdi-chevron-right"></i> FAQ'S</a></li>
								<li><a href="privacy-policy.html"><i class="mdi mdi-chevron-right"></i> Privacy
										Policy</a></li>
							</ul>
						</div>
					</div><!--end col-->
				</div><!--end row-->
			</div><!--end container-->
		</section>
		<!-- END FOOTER -->

		<!-- START FOOTER-ALT -->
		<div class="footer-alt">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="text-white-50 text-center mb-0">
							<script>document.write(new Date().getFullYear())</script> &copy; Jobcy - Job Listing Page
							Template by <a href="https://themeforest.net/search/themesdesign" target="_blank"
										   class="text-reset text-decoration-underline">Themesdesign</a>
						</p>
					</div><!--end col-->
				</div><!--end row-->
			</div><!--end container-->
		</div>
		<!-- END FOOTER -->


		<!--start back-to-top-->
		<button onclick="topFunction()" id="back-to-top">
			<i class="mdi mdi-arrow-up"></i>
		</button>
		<!--end back-to-top-->
	</div>
	<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>


<!-- Choice Js
<script src="/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
-->
<!-- Swiper Js -->
<script src="/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- BEGIN: Page Vendor JS-->
@yield('vendor-scripts')
<!-- END: Page Vendor JS-->
<!-- Index Js
<script src="/assets/js/pages/job-list.init.js"></script>
-->

<!--
<script src="/assets/js/pages/index.init.js"></script>

App Js -->

<!-- BEGIN: Page JS-->
@yield('page-scripts')
<!-- END: Page JS-->
<script src="/assets/js/app.js"></script>

</body>
</html>
