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
                                                      <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                                                      <span><i class="fa fa-clock-o"></i>3 min ago</span>
                                                      <ul class="react-links">
                                                            <li><a href="#" title=""><i class="fa fa-heart"></i> Vote 150</a></li>
                                                      </ul>
                                                      <ul class="quest-tags">
                                                            <li><a href="#" title="">Yaoundé</a></li>
                                                      </ul>
                                                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at libero elit. Mauris ultrices sed lorem nec efficitur. Donec sit amet facilisis lorem, quis facilisis tellus. Nullam mollis dignissim nisi sit amet tempor. Nullam sollicitudin neque a felis commodo gravida at sed nunc. In justo nunc, sagittis sed venenatis at, dictum vel erat. Curabitur at quam ipsum. Quisque eget nibh aliquet, imperdiet diam pharetra, dapibus lacus. Sed tincidunt sapien in dui imperdiet eleifend. Ut ut sagittis purus, non tristique elit. Quisque tincidunt metus eget ligula sodales luctus. Donec convallis ex at dui convallis malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pretium euismod mollis. Pellentesque convallis gravida ante eu pretium. Integer rutrum mi nec purus tincidunt, nec rhoncus mauris porttitor. Donec id tellus at leo gravida egestas. Suspendisse consequat mi vel euismod efficitur. Donec sed elementum libero.</p>
                                                      <p> Etiam rutrum ut urna eu tempus. Curabitur suscipit quis lorem vel dictum. Aliquam erat volutpat. Pellentesque volutpat viverra pulvinar. Mauris ac sapien ac metus tincidunt volutpat eu eu purus. Suspendisse pharetra quis quam id auctor. Pellentesque feugiat venenatis urna, vitae suscipit enim volutpat vitae. Nunc egestas tortor est, at sodales ligula auctor efficitur.</p>


                                                </div><!--usr_quest end-->
                                          </div><!--usr-question end-->
                                    </div><!--forum-post-view end-->

                                    <div class="next-prev">
                                          <a href="#" title="" class="fl-left">Preview</a>
                                          <a href="#" title="" class="fl-right">Next</a>
                                    </div><!--next-prev end-->
                              </div>

                              <div class="col-lg-4">
                                    <div class="widget widget-adver ">
                                          <div class="pf-hd">
                                                <h3>Photos & Videos</h3>
                                          </div>
                                          <div class="profiles-slider">
                                                <img class="user-profy" src="http://via.placeholder.com/370x270" alt="">
                                                <img class="user-profy" src="http://via.placeholder.com/370x270" alt="">
                                                <img class="user-profy" src="http://via.placeholder.com/370x270" alt="">
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
                                                      <span><img src="images/price1.png" alt="">46</span>
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
                                                      <span><img src="images/price2.png" alt="">39</span>
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
                                                      <span><img src="images/price3.png" alt="">30</span>
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