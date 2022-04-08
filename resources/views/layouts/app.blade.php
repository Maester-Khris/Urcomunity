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
    </style>
    @stack('styles')
</head>


<body>


    <div class="wrapper">

        <header >
            <div class="container">
                <div class="header-data">
                    <div class="logo" >
                        <a href="/" title="" style="position:absolute;top:7px;">
                            <img src="{{asset('images/01_Icon-Community@2x.png')}}" alt="" style="width:35px; height:35px;">
                        </a>
                    </div>
                    <div class="brand-title logo" style="height:35px; width:280px; padding-top:5px;">
                        <h1 style="font-size:20px;font-weight:bold;font-family:Georgia;color:white;">Kouti Vivre Ensemble</h1>
                    </div>
                    <nav>

                    </nav>
                    
                    <!--menu-btn end-->
                    @if (Auth::user())
                       <div class="user-account" style="width:160px;display:flex;flex-direction:row;justify-content:space-between;align-items:center;border:0;">
                           <div class="user-info">
                               <img src="http://via.placeholder.com/30x30" alt="">
                               <a href="#" title="">{{ explode(' ',Auth::user()->name)[0]  }}</a>
                           </div>

                            <form action="{{url('logout')}}" method="POST">
                                @csrf
                                <button id="logout" type="submit" class="btn" style="margin-left:3px;padding:5px;background:transparent;">
                                   <i class="fa fa-sign-out" style="color:#C0D8C0;font-size:20px;"></i>
                                </button>
                            </form>
                       </div>
                       {{-- <div class="user-account"> background:transparent;
						<div class="user-info">
							<img src="http://via.placeholder.com/30x30" alt="">
							<a href="#" title="">John</a>
                            <button class="btn" style="background: transparent;margin-left:10px; padding:5px; ">
                                <i class="fa fa-sign-out" style="color:#44AE92;font-size:20px;"></i>
                            </button>
						</div>
				    	</div> --}}
                     @endif
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
