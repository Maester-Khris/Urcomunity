<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Urcomunity - {{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    {{-- {{asset('css/responsive.css')}} --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    @stack('styles')
</head>


<body>


    <div class="wrapper">

        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.html" title=""><img src="images/01_Icon-Community@2x.png" alt=""
                                style="width:35px; height:35px;"></a>
                    </div>
                    <div class="brand-title logo" style="height:30px; width:80px; padding-top:5px;">
                        <h1 style="font-size:20px;font-weight:bold;font-family:Georgia;color:white;">Urcomunity</h1>
                    </div>
                    <nav>

                    </nav>
                    <!--nav end-->
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>
                    <!--menu-btn end-->
                    <div class="user-account">
                        <div class="user-info">
                            <img src="http://via.placeholder.com/30x30" alt="">
                            <a href="#" title="">Julie</a>
                        </div>

                    </div>
                </div>
                <!--header-data end-->
            </div>
        </header>
        <!--header end-->

        @yield('content')


    </div>
    <!--theme-layout end-->



    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/flatpickr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

    @stack('scripts')
</body>

</html>
