<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Urcomunity - connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
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
      {{-- https://www.rca.org/wp-content/uploads/2020/05/D087-0336-43_344217-scaled.jpg --}}
      <style media="screen">
      .cs-bg {
            height: 100vh; 
            background: url("{{asset('/images/login_image.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
      }
      </style>
</head>

<body class="sign-in">

	<div class="wrapper">


		<div class="sign-in-page cs-bg">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
                                                      <div class="" style="display:flex;flex-direction:row;">
                                                            <img src="images/01_Icon-Community@2x.png" alt="" style="width:60px; height:60px; margin-right:15px;">
                                                            <h3 class="" style="transform: translateY(25%);font-size:20px;font-weight:bold;font-family:Georgia;">Kouti Vivre Ensemble</h3>
                                                      </div>
									
									<p>Kouti Vivre ensemble, est un groupe crée pour permttre a tout les ressortissant
										de la zone de kouti de se retrouver et partager ensemble.

									</p>
								</div><!--cm-logo end-->
								<!-- <img src="images/cm-main-img.png" alt=""> -->
							</div><!--cmp-info end-->
						</div>

						<div class="col-lg-6">
							<div class="login-sec">

								<div class="sign_in_sec current" id="tab-1" style="margin-top:50px;">

									<h3>Connexion</h3>
									<form action="{{url('login')}}" method="POST">
										@csrf
										<div class="row">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="text" name="nom_membre" placeholder="Nom du membre">
													<i class="la la-user"></i>
												</div><!--sn-field end-->
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" name="matricule_membre" placeholder="mot de passe (matricule)">
													<i class="la la-lock"></i>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">
														<input type="checkbox" name="remember" id="c1" value="yes">
														<label for="c1">
															<span></span>
														</label>
														<small>Rester connecté</small>
													</div><!--fgt-sec end-->

														<a href="#" title="" style="font-size:12px;font-style:italic;transform:translateY(2px);">
														      Mot de passe oublié?
														</a>

												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<button type="submit" value="submit">Se connecter</button>
											</div>
										</div>
									</form>

								</div>
								<!-- ========================  Connexion ======================= -->




							</div><!--login-sec end-->
						</div>
					</div>
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->

                 <div class="footy-sec">
				<div class="container">
					<ul>
                                    <li><a href="/zones-voir" title="">Zones</a></li>
                                    <li><a href="/membres-voir" title="">Membres</a></li>
                                    <li><a href="#" title="">Regles du groupe</a></li>
                                    <li><a href="#" title="">A propos de la communauté</a></li>
                                    <li><a href="/contact" title="">Contacter un delegué</a></li>
                              </ul>
					<p><img src="images/copy-icon.png" alt="">Copyright 2022</p>
				</div>
			</div><!--footy-sec end-->
			
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->

      

</body>
</html>