<!doctype html>
<html lang="en">

  <head>
    <title>RePrint | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('reprint/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('reprint/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('reprint/css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('reprint/css/style.css')}}">

    @yield('header')

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    @yield('content')

    <script src="{{asset('reprint/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('reprint/js/popper.min.js')}}"></script>
    <script src="{{asset('reprint/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('reprint/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('reprint/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('reprint/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('reprint/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('reprint/js/aos.js')}}"></script>

    <script src="{{asset('reprint/js/main.js')}}"></script>

    @yield('footer')


  </body>

</html>

