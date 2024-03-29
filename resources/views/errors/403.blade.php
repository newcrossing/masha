<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8"/>
    <title>Error 403 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" "/>
    <meta name="keywords" content=""/>
    <meta content="Themesdesign" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>
    <!--Custom Css-->

</head>

<body>

<!--end page Loader -->

<!-- Begin page -->
<div>
    <div class="main-content">
        <div class="page-content">

            <!-- START ERROR -->
            <section class="bg-error bg-auth text-dark">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <img src="/assets/images/404.png" alt="" class="img-fluid">
                                <div class="mt-5">
                                    <!-- <h1 class="fw-bold display-1">404</h1> -->
                                    <h4 class="text-uppercase mt-3">Пользователь не автоизован</h4>
                                    <p class="text-muted">Возможно, мы ее еще не создали</p>
                                    <div class="mt-4">
                                        <a class="btn btn-primary waves-effect waves-light" href="/"><i
                                                    class="mdi mdi-home"></i> На главную</a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section>
            <!-- END ERROR -->

        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Style switcher -->
<div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
    <div>
        <h6>Select your color</h6>
        <ul class="pattern list-unstyled mb-0">
            <li>
                <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
            </li>
            <li>
                <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
            </li>
            <li>
                <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
            </li>
        </ul>
        <div class="mt-3">
            <h6>Light/dark Layout</h6>
            <div class="text-center mt-3">
                <!-- light-dark mode -->
                <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                    <i class="uil uil-brightness mode-dark mx-auto"></i>
                    <i class="uil uil-moon mode-light"></i>
                </a>
                <!-- END light-dark Mode -->
            </div>
        </div>
    </div>

</div>
<!-- end switcher-->

<!--start back-to-top-->
<button onclick="topFunction()" id="back-to-top">
    <i class="mdi mdi-arrow-up"></i>
</button>
<!--end back-to-top-->

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>


<!-- Switcher Js -->
<script src="assets/js/pages/switcher.init.js"></script>

</body>
</html>
