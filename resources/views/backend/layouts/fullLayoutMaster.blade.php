<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->


<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Маша</title>
    <link rel="apple-touch-icon" href="{{asset('adm/assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('adm/assets/images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('backend.panels.styles')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body  class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-12 mb-2 mt-1">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h5 class="content-header-title float-left pr-1 mb-0">Date &amp; Time Picker</h5>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb p-0 mb-0">
                                  <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                  <li class="breadcrumb-item"><a href="#">Form Elements</a>
                                  </li>
                                  <li class="breadcrumb-item active">Date &amp; Time Picker
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <div class="content-body">
         @yield('content')
        </div>
      </div>
    </div>
    <!-- END: Content-->

    {{-- scripts --}}
    @include('backend.panels.scripts')

  </body>
  <!-- END: Body-->
</html>
