@extends('layouts.app',['title'=>'Liste des Events'])
@push('styles')
<style>
.usr_img > img{
	width: 60px;
	height: 60px;
}
</style>
@endpush

@section('content')

	<section class="forum-sec">
		<div class="container">
			<div class="forum-links">
				<ul>
					<li class="active"><a href="/evenements" title="">Tous les evenements</a></li>
					<!-- <li><a href="/evts-details" title="">Event description</a></li> -->
				</ul>
			</div><!--forum-links end-->
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
									@if ($event->membre->url_photo == null)
									<img src="{{asset('images/user_default.jpg')}}" alt="">
									@else
									<img src="{{asset('uploads/profils/'.$event->membre->url_photo)}}" alt="">
									@endif
								</div>
								<div class="usr_quest">
									<h3 style="margin-bottom:7px;">{{$event->titre}}</h3>
									<ul class="react-links" style="margin-bottom:10px;">
										<li><a href="#" title="" style="color:#a8dadc"><i class="fa fa-user" ></i>{{$event->membre_name}}</a></li>
									</ul>
									<p style="margin-top:8px;">{{Str::limit($event->description,180)}}</p>
										<ul class="quest-tags" >
										<li>
											<a href="{{route('details',[$event->id])}}" title="" style="background:seashell;color:gold;padding-left:12px;padding-right:12px;border-radius:5px;">
												<span style="margin-right:3px;font-style:italic;font-size:14px;">Lire la suite</span>  
												<i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 12px"></i>
												<i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 12px;transform:translateX(-5px);"></i>
											</a>
										</li>
									</ul>
								</div><!--usr_quest end-->
								<span class="quest-posted-time" style="color:#3d405b;"><i class="fa fa-clock-o"></i>{{ date('d-m-Y', strtotime($event->created_at))}}</span>
							</div><!--usr-question end-->
							@endforeach
						</div><!--forum-questions end-->
						<nav aria-label="Page navigation example" class="full-pagi">
							{{ $events->links('vendor.pagination.custom') }}
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
