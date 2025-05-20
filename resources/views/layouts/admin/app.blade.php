<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>@yield('title') | Admin</title>
  <!-- [Meta] -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('assets/admin/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/tabler-icons.min.css') }}" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/feather.css') }}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/fontawesome.css') }}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/material.css') }}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" id="main-style-link" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/style-preset.css') }}" >

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <!-- [ Sidebar Menu ] start -->
  @include('layouts/admin/sidebar/index')
  <!-- [ Sidebar Menu ] end -->
  
  <!-- [ Header Topbar ] start -->
  @include('layouts/admin/navbar/index')
  <!-- [ Header ] end -->
  
  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      @yield('content')
    </div>
  </div>
  <!-- [ Main Content ] end -->
  
  @include('layouts/admin/footer/index')

  <!-- [Page Specific JS] start -->
  <script src="{{ asset('assets/admin/js/plugins/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/pages/dashboard-default.js') }}"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="{{ asset('assets/admin/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('assets/admin/js/pcoded.js') }}"></script>
  <script src="{{ asset('assets/admin/js/plugins/feather.min.js') }}"></script>
  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>
</body>