<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Markedia - Marketing Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="{{ asset('css/version/marketing.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="wrapper">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
    </div>


    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
