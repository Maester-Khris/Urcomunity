@extends('layouts.app',['title'=>'Events List'])

@section('content')

	<section class="forum-sec">
		<div class="container">
			<div class="forum-links">
				<ul>
					<li class="active"><a href="/evenements" title="">Tous les evenements</a></li>
					<!-- <li><a href="/evts-details" title="">Event description</a></li> -->
				</ul>
			</div><!--forum-links end-->
			<div class="forum-links-btn">
				<a href="#" title=""><i class="fa fa-bars"></i></a>
			</div>
		</div>
	</section>

	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-8">
						<div class="forum-questions">
							@foreach($events as $event)
							<div class="usr-question">
								<div class="usr_img">
									<img src="http://via.placeholder.com/60x60" alt="">
								</div>
								<div class="usr_quest">
									<h3 style="margin-bottom:7px;">{{$event->titre}}</h3>
									<ul class="react-links" style="margin-bottom:10px;">
										<li><a href="#" title=""><i class="fa fa-user"></i>{{$event->membre_name}}</a></li>
									</ul>
									<p style="margin-top:8px;">{{Str::limit($event->description,180)}}</p>
										<ul class="quest-tags" >
										<li><a href="{{route('details',[$event->id])}}" title="" style="background:gold;padding-left:12px;padding-right:12px;">Lire la suite</a></li>
									</ul>
								</div><!--usr_quest end-->
								<span class="quest-posted-time"><i class="fa fa-clock-o"></i>{{ date('d-m-Y', strtotime($event->created_at))}}</span>
							</div><!--usr-question end-->
							@endforeach
						</div><!--forum-questions end-->
						<nav aria-label="Page navigation example" class="full-pagi">
						<ul class="pagination">
							<li class="page-item"><a class="page-link pvr" href="#">Precedent</a></li>
							<li class="page-item"><a class="page-link active" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item"><a class="page-link" href="#">6</a></li>
							<li class="page-item"><a class="page-link pvr" href="#">Suivant</a></li>
						</ul>
						</nav>
					</div>
						<!-- center pane-->

					<div class="col-lg-4">
						<div class="widget widget-adver" style="position:relative;">
							<p style="color:gray; font-size:18px;font-family:Source Sans Pro;font-weight:bold;position:absolute;bottom:0;right:10px;">Derniers evenements de la semaine</p>
							<img src="images/de-live_venue3326_admin.png" style="width:350px;height:270px;" alt="Last image of vents">
						</div><!--widget-adver end-->
					</div>
					<!-- right side pane-->
				</div>
			</div><!--forum-questions-sec end-->
		</div>
	</section><!--forum-page end-->

	{{-- footer --}}
	@include('layouts.footer')

@endsection
