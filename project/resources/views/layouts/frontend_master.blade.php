
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bootstrap Blog - B4 Template by Bootstrap Temple</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/fontastic.css">
        <!-- Google fonts - Open Sans-->

        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/animate.css">
        <link rel="stylesheet" href="{{ asset('Frontend') }}/https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('Frontend') }}/favicon.png">

    </head>
    <body>
     @includeIf('Frontend.inc.navbar')
        <!-- Hero Section-->

        <!-- Page Footer-->
       @includeIf('Frontend.inc.footer')
        <!-- JavaScript files-->
        <script src="{{ asset('Frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('Frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('Frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('Frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('Frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/wow.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/front.js"></script>
        <script src="{{ asset('Frontend') }}/js/custom.js"></script>
    </body>
</html>
