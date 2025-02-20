<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">

<!-- BEGIN: Head-->



<head>

    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="">

    <meta name="author" content="Daweer">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('web') }}/images/logo1.png">



    <title> لوحة التحكم</title>





    <!-- BEGIN: stype -->

        @include('layouts.style')

    <!-- END: stype -->



    @stack('third_party_stylesheets')



    @stack('page_css')



</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">



    <!-- BEGIN: Header-->

        @include('layouts.header')

    <!-- END: Header-->



    <!-- BEGIN: Main Menu-->

        @include('layouts.sidebar')

    <!-- END: Main Menu-->



    <!-- BEGIN: Content-->

        @yield('content')

    <!-- END: Content-->



    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>



    <!-- BEGIN: Footer-->

        @include('layouts.footer')

    <!-- END: Footer-->





    <!-- BEGIN: script-->

        @include('layouts.script')

    <!-- END: script-->



    @stack('third_party_scripts')



    @stack('page_scripts')

</body>

<!-- END: Body-->



</html>
