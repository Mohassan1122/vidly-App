<!-- f8f8f8 -->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viavi Directory Listing HTML</title>


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{  url('frontend/images/images/main/favicon.png') }}">
    <!-- Style Sheets -->
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800%7CMontserrat:400,700'
        rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/bootstrap.min2.css') }}" type="text/css">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/stylesheet.css') }}" type="text/css">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/responsive_style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/Extra.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  url('frontend/assets/mainWorkAsset/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{  url('frontend/assets/mainWorkAsset/css/icofont/icofont.min.css') }}"
        type="text/css">
    <!-- Ion-eshop 4 -->
    <link rel="stylesheet" href="{{  url('frontend/assets/eshop_Assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{  url('frontend/assets/eshop_Assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{  url('frontend/assets/eshop_Assets/css/utility.css') }}">
    <link rel="stylesheet" href="{{  url('frontend/assets/eshop_Assets/css/fontawesome.min.css') }}">

</head>


<body>
    @include('frountend.layout.header')





    @yield('content')






    @include('frountend.layout.footer')
    <!--======Footer end==========-->
    <!-- Scripts -->

    <script src="{{  url('frontend/assets/mainWorkAsset/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{  url('frontend/assets/mainWorkAsset/js/bootstrap2.js') }}"></script>
    <script src="{{  url('frontend/assets/mainWorkAsset/js/jquery_custom.js') }}"></script>


    <!-- jQuery -->
    <script type="text/javascript" src="{{  url('frontend/assets/eshop_Assets/js/jquery.min.js') }}"></script>
    <!-- jquery-ui-range-slider -->
    <script type="text/javascript" src="{{  url('frontend/assets/eshop_Assets/js/jquery-ui.range-slider.min.js') }}">
    </script>
    <!-- jQuery Slim-Scroll -->
    <script type="text/javascript" src="{{  url('frontend/assets/eshop_Assets/js/jquery.slimscroll.min.js') }}">
    </script>
    <!-- Main -->
    <script type="text/javascript" src="{{  url('frontend/assets/eshop_Assets/js/app.js') }}"></script>
</body>
</html>
