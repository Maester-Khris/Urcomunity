@extends('layouts.app',['title'=>'Event View'])

@section('content')

      <section class="forum-sec">
            <div class="container">
                  <div class="forum-links">
                        <ul>
                              <li><a href="/evenements" title="">All events</a></li>
                              <li  class="active"><a href="/evts-details" title="">Event description</a></li>
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

                                    <div class="forum-post-view">
                                          <div class="usr-question">
                                                <div class="usr_img">
                                                      <img src="http://via.placeholder.com/60x60" alt="">
                                                </div>
                                                <div class="usr_quest">
                                                      <h3>{{$details['titre']}}</h3>
                                                      <span><i class="fa fa-clock-o"></i>{{$details['interval_jour']}} days ago</span>
                                                      <ul class="react-links">
                                                            <li><a href="#" title=""><i class="fa fa-user"></i>{{$details['membre_name']}}</a></li>
                                                            <li><a href="#" title=""><i class="fa fa-heart"></i> Vote 150</a></li>
                                                      </ul>
                                                      <ul class="quest-tags">
                                                            <li><a href="#" title="">{{$details['qualificatif']}}</a></li>
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
                                                <h3>Photos & Videos</h3>
                                          </div>
                                          <div class="profiles-slider">
                                             @foreach($details['medias'] as $media)
                                                <img class="user-profy" src="{{asset('uploads/events/'.$media->url_destination.'')}}" alt="" style="height:300px;width:300px;">
                                             @endforeach
                                          </div>
                                    </div><!--widget-adver end-->
                                    <div class="widget widget-user">
                                          <h3 class="title-wd">Top Member of the Week</h3>
                                          <ul>
                                                <li>
                                                      <div class="usr-msg-details">
                                                            <div class="usr-ms-img">
                                                                  <img src="http://via.placeholder.com/50x50" alt="">
                                                            </div>
                                                            <div class="usr-mg-info">
                                                                  <h3>Jessica Konguem</h3>
                                                                  <p>Self Entrepreneur</p>
                                                            </div><!--usr-mg-info end-->
                                                      </div>
                                                      <span><img src="{{asset('images/price1.png')}}" alt="">46</span>
                                                </li>
                                                <li>
                                                      <div class="usr-msg-details">
                                                            <div class="usr-ms-img">
                                                                  <img src="http://via.placeholder.com/50x50" alt="">
                                                            </div>
                                                            <div class="usr-mg-info">
                                                                  <h3>John Mechui</h3>
                                                                  <p>Kraft Arts</p>
                                                            </div><!--usr-mg-info end-->
                                                      </div>
                                                      <span><img src="{{asset('images/price2.png')}}" alt="">39</span>
                                                </li>
                                                <li>
                                                      <div class="usr-msg-details">
                                                            <div class="usr-ms-img">
                                                                  <img src="http://via.placeholder.com/50x50" alt="">
                                                            </div>
                                                            <div class="usr-mg-info">
                                                                  <h3>Patrick Bessala</h3>
                                                                  <p>Civil Administrator</p>
                                                            </div><!--usr-mg-info end-->
                                                      </div>
                                                      <span><img src="{{asset('images/price3.png')}}" alt="">30</span>
                                                </li>
                                          </ul>
                                    </div><!--widget-user end-->
                              </div>

                        </div>
                  </div><!--forum-questions-sec end-->
            </div>
      </section><!--forum-page end-->

      {{-- footer --}}
      @include('layouts.footer')

@endsection
