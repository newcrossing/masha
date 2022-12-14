<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <meta charset="utf-8"/>
    <title>@yield('title') / Маша-растеряша</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" "/>
    <meta name="keywords" content=""/>
    <meta content="Themesdesign" name="author"/>

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

    @include('frontend.moduls.modal')


    <div class="main-content">

        <div class="page-content">
            @yield('content')
        </div>
        <!-- End Page-content -->


        <!-- START FOOTER -->
        @include('frontend.moduls.footer')

        <!-- END FOOTER -->

        <!-- START FOOTER-ALT -->
        <div class="footer-alt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-white-50 text-center mb-0">
                            <script>document.write(new Date().getFullYear())</script> &copy; Маша-растеряша
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


<!-- Choice Js-->
<script src="/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- Swiper Js -->
<script src="/assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- BEGIN: Page Vendor JS-->
@yield('vendor-scripts')
<!-- END: Page Vendor JS-->
<!-- Index Js
<script src="/assets/js/pages/job-list.init.js"></script>
-->

<!--App Js -->
<script src="/assets/js/pages/index.init.js"></script>


<!-- BEGIN: Page JS-->
@yield('page-scripts')
<!-- END: Page JS-->
<script src="/assets/js/app.js"></script>

</body>
</html>
