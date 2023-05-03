<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title') / Маша-растеряша</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description','Бюро находок по QR-коду. Сервис поиска пропавших вещей по QR-коду')">
    <meta name="keywords" content="@yield('meta_keywords','Поиск вещей, подарок, брелок, бюро находок, пропавшие вещи')">
    <meta content="" name="author"/>
    <meta name="yandex-verification" content="a6bf96ae76fba42e"/>

    <!-- App favicon -->
    <link rel="apple-touch-icon" href="/assets/favicon/logo.png">  <!-- 180×180 -->
    <!-- 180x180 - ставим первым для safari -->
    <link rel="icon" href="/favicon.ico" sizes="any"><!-- 32x32 -->
    <link rel="icon" href="/assets/favicon/favicon-3.svg" type="image/svg+xml">
    <link rel="manifest" href="manifest.webmanifest">
    <link rel="yandex-tableau-widget" href="/tableau.json">

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
@include('frontend.moduls.metrika')
<!-- END: Page JS-->
<script src="/assets/js/app.js"></script>

</body>
</html>
