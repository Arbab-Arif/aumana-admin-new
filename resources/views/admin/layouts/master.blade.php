<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>
        @hasSection('page-title')
            Admin Panel - @yield('page-title')
        @else
            Admin Panel
        @endif
    </title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/admin-assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Core style -->
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/core.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Toastr Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <style>
        .preloader {
            background-color: #f4f6f9c4 !important;
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <div class="custom-loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    @include('admin.layouts.nav')

    @include('admin.layouts.side_bar')

    @yield('main-content')

    <footer class="main-footer">

    </footer>
</div>


<script src="{{ asset('/admin-assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('/admin-assets/js/core.js') }}"></script>


<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(function () {
        setTimeout(function () {
            hideLoader();
        }, 200)
    });

    @if(Session::has('Admin_SUCCESS'))
    toastr.success("{{ session('Admin_SUCCESS') }}");
    @elseif(Session::has('Admin_ERROR'))
    toastr.error('<?php echo Session::get('Admin_ERROR'); ?>');
    @endif

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function showLoader(){
        $(".preloader").show();
    }

    function hideLoader() {
        $(".preloader").hide();
    }
</script>
@stack('scripts')
</body>
</html>
