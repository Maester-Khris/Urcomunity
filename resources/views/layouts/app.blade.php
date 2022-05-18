<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Urcomunity - {{$title}}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/01_Icon-Community@2x.png')}}">
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
    <style>
        button#logout:hover i.fa{
            transform: scale(1.5);
            color:#BAFFB4!important;
        }
        .btn:focus,.btn:active {
            outline: none !important;
            box-shadow: none;
        }
        @media only screen and (max-width: 400px) {
            /* For mobile phones: */
            div.logo {
                width: 40px!important;
            }
            div.brand-title.logo {
                width: 100px!important;
                height: 35px!important;
                text-align: left;
            }
            div.brand-title.logo h1 {
                font-size: 15px!important;
            }
        }
    </style>
    @stack('styles')
</head>


<body>


    <div class="wrapper">

        <header >
            <div class="container">
                <div class="header-data d-flex justify-content-between" style="padding:7px 0;">
                    <div class="d-flex" style="width: 60%;">
                        <div class="logo d-flex flex-column justify-content-center" style="margin-top: 0px;">
                            <a href="/" title="" >
                                <img src="{{asset('images/01_Icon-Community@2x.png')}}" alt="" style="width:35px; height:35px;">
                            </a>
                        </div>
                        <div class="brand-title d-flex flex-column justify-content-center" style="height:35px; width:280px; padding-top:5px;">
                            <h1 style="font-size:20px;font-weight:bold;font-family:Georgia;color:white;">Kouti Vivre Ensemble</h1>
                        </div>
                    </div>
                    
                    
                    <!--menu-btn end-->
                    @if (Auth::user())
                       <div class="user-account" style="width:160px;display:flex;flex-direction:row;justify-content:space-between;align-items:center;border:0;">
                           <div class="user-info" style="padding: 0;"> 
                               <img src="{{asset('uploads/profils/'. Auth::user()->url_photo)}}" alt="" style="height: 30px; width:30px;">
                               <a href="#" title="">{{ explode(' ',Auth::user()->name)[0]  }}</a>
                           </div>

                            <form action="{{url('logout')}}" method="POST">
                                @csrf
                                <button id="logout" type="submit" class="btn" style="margin-left:3px;padding:5px;background:transparent;">
                                   <i class="fa fa-sign-out" style="color:#C0D8C0;font-size:20px;"></i>
                                </button>
                            </form>
                       </div>
                     @endif
                </div>
             
            </div>
        </header>

        @yield('content')
    </div>



    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/flatpickr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

    @stack('scripts')
</body>

</html>
