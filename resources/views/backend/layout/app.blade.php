<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/plugins/font-awesome/css/all.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('backend/assets/plugins/themify/css/themify.css') }}" rel="stylesheet" type="text/css">

    <!-- Angular Tooltip Css -->
    <link href="{{ asset('backend/assets/plugins/angular-tooltip/angular-tooltips.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('backend/assets/plugins/morris.js/morris.css') }}" rel="stylesheet">

    <!-- Page level plugin CSS -->
    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/glovia.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/glovia-responsive.css') }}" rel="stylesheet">

    <!-- Custom styles for Color -->
    <link href="{{ asset('backend/css/skins/default.css') }}" rel="stylesheet">

    <!-- SELECT 2 css file -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    @yield('css')
</head>

<body class="fixed-nav sticky-footer" id="page-top">

<!-- ===============================
    Navigation Start
====================================-->
<nav class="navbar navbar-expand-lg bb-1 navbar-light bg-white fixed-top" id="mainNav">

    <!-- Start Header -->
    <header class="header-logo bg-dark bb-1 br-1 br-light-dark">
        <a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
        <a class="gredient-cl navbar-brand" href="{{ url('admin') }}">{{ 'Admin Panel' }}</a>
    </header>
    <!-- End Header -->

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ti-align-left"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- =============== Start Side Menu ============== -->
            @include('backend.inc.nav')
        <!-- =============== End Side Menu ============== -->

        <!-- =============== Header Rightside Menu ============== -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-0 user-img a-topbar__nav a-nav" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('storage/'.auth()->user()->photo) }}" alt="user-img" width="36" class="img-circle">
                    <b class="f-size-17">{{ auth()->user()->name }}</b>
                </a>

                <ul class="dropdown-menu dropdown-user animated flipInX" aria-labelledby="userDropdown">
                    <li class="dropdown-header green-bg">
                        <div class="header-user-pic">
                            <img src="{{ url('storage/'.auth()->user()->photo) }}" alt="user-img" width="36" class="img-circle">
                        </div>
                        <div class="header-user-det">
                            <span class="a-dropdown__header-title">{{ auth()->user()->flName }}</span>
                            <span class="a-dropdown__header-title">Admin</span>
                        </div>
                    </li>
                    <li><a class="dropdown-item" href="{{ url('admin/users/'.@Auth::user()->id) }}"><i class="ti-user"></i> Profilim</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
        <!-- =============== End Header Rightside Menu ============== -->
    </div>
</nav>
<!-- =====================================================
                    End Navigations
======================================================= -->

<div class="content-wrapper">
    <div class="container-fluid">

        <!-- Title & Breadcrumbs-->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h4 class="theme-cl">@yield("whereiam")</h4>
            </div>
        </div>
        <!-- Title & Breadcrumbs-->

        @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small class="font-15">Copyright © By Elvir,Sahil,Hacı <i class="fa fa-heart cl-danger"></i> In Azerbaijan</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded cl-white gredient-bg" href="#page-top">
        <i class="ti-angle-double-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend/assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Slick Slider Js -->
    <script src="{{ asset('backend/assets/plugins/slick-slider/slick.js') }}"></script>

    <!-- Slim Scroll -->
    <script src="{{ asset('backend/assets/plugins/slim-scroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Angular Tooltip -->
    <script src="{{ asset('backend/assets/plugins/angular-tooltip/angular.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/angular-tooltip/angular-tooltips.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/angular-tooltip/index.js') }}"></script>

    <!-- Morris.js charts -->
    <script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/font-awesome/js/all.js') }}"></script>

    <!-- Custom Chart JavaScript -->
    <script src="{{ asset('backend/js/custom/dashboard/dashboard.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('backend/js/glovia.js') }}"></script>

    <!-- SELECT 2 js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    @yield('js')

    <script>
        $('.dropdown-toggle').dropdown()
    </script>

</div>
<!-- Wrapper -->

</body>
</html>
