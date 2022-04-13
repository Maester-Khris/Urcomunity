@extends('layouts.app',['title'=>'Description de l\'event'])

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
.usr_img > img{
width: 60px;
height: 60px;
}
.alter_images > img{
width: 60px;
height: 60px;
}

@media only screen and (min-width: 400px) {
      .alter_images{
            display: none;
      }
}

@media only screen and (max-width: 400px) {
      /* For mobile phones: */
      .profiles-slider{
            display: none;
      }
      .alter_images{
            display: block;
      }
      /* 
      div.slick-list.draggable {
            max-height: 300px!important;
      }
      div.slick-list img {
            width: 150px!important;
            height: 150px!important;
      } 
      img.user-profy.slick-slide{
            max-width: 300px!important;
            max-height: 250px!important;
      } */
}
</style>
@endpush

@push('scripts')
<script>
      function plusOneView(event_id){
            let _token = $('meta[name="csrf-token"]').attr('content');
            let data = {
                  eventid: event_id,
                  _token: _token
            };
            console.log(data);
            $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            $.ajax({
                  url: "/add-views",
                  type:"POST",
                  data:data,
                  success:function(response){
                        if(response) {
                              console.log(response);
                        }
                  },
                  error: function(error) {
                        console.log(error);
                  }
            });
      }
</script>
<script type="text/javascript">
      $(document).ready(function() {
            var checkLoaded = setInterval(function() {
                  var $template = $('#template');
                  var node = $template.prop('content');
                  var $content = $(node).find('div');
                  if($content.text()){
                        plusOneView($content.text());
                        clearInterval(checkLoaded);
                  }else{
                        console.log("en attente");
                  }   
            }, 2000);   
            
            $(".slides").slick({
            autoplay:true,
            mobileFirst:true,//add this one
            }
      });
</script>
@endpush

@section('content')

      <section class="forum-sec">
            <div class="container">
                  <div class="forum-links">
                        <ul>
                              <li><a href="/evenements" title="">Tous les evenements</a></li>
                              <li  class="active"><a href="/evts-details" title="">Description d'un evenement</a></li>
                        </ul>
                  </div><!--forum-links end-->
            </div>
      </section>

      <section class="forum-page">
            <div class="container">
                  <div class="forum-questions-sec">
                        <div class="row">
                              <div class="col-lg-8">

                                    <div class="forum-post-view">
                                          <div class="usr-question">
                                                <div class="usr_img">
                                                      @if ($details['membre_photo'] == null)
                                                      <img src="{{asset('images/user_default.jpg')}}" alt="">
                                                      @else
                                                      <img src="{{asset('uploads/profils/' .$details['membre_photo'] )}}" alt="">
                                                      @endif
                                                </div>
                                                <div class="usr_quest">
                                                      <h3>{{$details['titre']}}</h3>
                                                      <span style="color:#457b9d"><i class="fa fa-clock-o"></i> il y a {{$details['interval_jour']}} jours</span>
                                                      <ul class="react-links">
                                                            <li><a href="#" title="" style="color:#a8dadc"><i class="fa fa-user"></i>{{$details['membre_name']}}</a></li>
                                                            <li><a href="#" title="" style="color:#e63946"><i class="fa fa-eye"></i>Vues {{$details['vues']}}</a></li>
                                                      </ul>
                                                      <ul class="quest-tags">
                                                            @if($details['qualificatif'] == "Heureux")
                                                                  <li><a href="#" title="" style="background:#ffd6a5">{{$details['qualificatif']}}</a></li>
                                                            @else
                                                                  <li><a href="#" title="" style="background:#b5838d">{{$details['qualificatif']}}</a></li>
                                                            @endif
                                                           
                                                            <li><a href="#" title="">{{$details['membre_zone']}}</a></li>
                                                      </ul>
                                                      <p>{{$details['description']}}</p>

                                                </div><!--usr_quest end-->
                                          </div><!--usr-question end-->
                                    </div><!--forum-post-view end-->

                                    <div class="next-prev">
                                          <a href="{{route('details',[$details['prec']])}}" title="" class="fl-left">Precedent</a>
                                          <a href="{{route('details',[$details['suiv']])}}" title="" class="fl-right">Suivant</a>
                                    </div><!--next-prev end-->
                              </div>

                              <div class="col-lg-4">
                                    <div class="widget widget-adver ">
                                          <div class="pf-hd">
                                                <h3>Photos & Vidéos</h3>
                                          </div>
                                          <div class="profiles-slider">
                                                @if(count($details['medias']) == 0)
                                                <img class="user-profy" src="{{asset('images/event-default1.png')}}" alt="" style="height:200px;width:200px;">
                                                @else
                                                      @foreach($details['medias'] as $media)
                                                            <img class="user-profy" src="{{asset('uploads/events/'.$media->url_destination.'')}}" alt="" style="height:300px;width:300px;">
                                                      @endforeach
                                                @endif
                                          </div>
                                          <div class="alter_images" >
                                                @if(count($details['medias']) == 0)
                                                <img class="user-profy img-thumbnail rounded float-left" src="{{asset('images/event-default1.png')}}" alt="" style="height:100px;width:100px;">
                                                @else
                                                      @foreach($details['medias'] as $media)
                                                      <img class="user-profy img-thumbnail rounded float-left" src="{{asset('uploads/events/'.$media->url_destination.'')}}" alt="..." style="height:100px;width:100px;padding-top:0;padding-right:8px;" >
                                                      @endforeach
                                                @endif
                                          </div>
                                    </div><!--widget-adver end-->
                              </div>

                        </div>
                  </div><!--forum-questions-sec end-->
            </div>
            <template id="template">
                  <div>{{$details['id']}}</div>
            </template>
            
      </section><!--forum-page end-->

      {{-- footer --}}
      @include('layouts.footer')

@endsection
