@extends('layouts.app',['title'=>'Home'])

@section('content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">

                    <!--=========== Section =============
                                                      LEFT PANE
                              =============== =============-->
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="http://via.placeholder.com/100x100" alt="">
                                        </div>
                                    </div>
                                    <!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>Ndongo Julienne</h3>
                                        <span>Executive Manager</span>
                                    </div>
                                </div>
                                <!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <a href="/site-managment" title="">Manage Site</a>
                                    </li>
                                </ul>
                            </div>
                            <!--user-data end-->


                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="#" title="">Zones</a></li>
                                    <li><a href="#" title="">Members</a></li>
                                    <li><a href="#" title="">Group rules</a></li>
                                    <li><a href="#" title="">Community Guidelines</a></li>
                                    <li><a href="#" title="">Past activities</a></li>
                                </ul>
                                <div class="cp-sec">
                                    <img src="images/01_Icon-Community@2x.png" alt="" style="width:25px; height:25px;">
                                    <p><img src="images/cp.png" alt="">Copyright 2022</p>
                                </div>
                            </div>
                            <!--tags-sec end-->
                        </div>
                        <!--managing site end-->

                        <div class="top-profiles">
                            <div class="pf-hd">
                                <h3>Active Members</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div>
                            <div class="profiles-slider">
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                                <div class="user-profy">
                                    <img src="http://via.placeholder.com/57x57" alt="">
                                    <h3>John Doe</h3>
                                    <span>Graphic Designer</span>
                                    <ul>
                                        <li><a href="#" title="" class="followw">Follow</a></li>
                                        <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                        </li>
                                        <li><a href="#" title="" class="hire">hire</a></li>
                                    </ul>
                                </div>
                                <!--user-profy end-->
                            </div>
                            <!--profiles-slider end-->
                        </div>
                        <!--top-profiles end-->

                    </div>
                    <!--main-left-sidebar end-->


                    <!--=========== Section =============
                                                      CENTER PANE
                              =============== =============-->
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">

                            <div class="post-topbar">
                                <div class="user-picy">
                                    <img src="images/de-live_venue3326_admin.png" style="width:50px;height:50px;"
                                        alt="">
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="" href="/evenements" title="">Liste des evenements</a></li>
                                        <li><a class="active" href="/post-event" title="">Poster un evenement</a></li>
                                    </ul>
                                </div>
                                <!--post-st end-->
                            </div>
                            <!--post-topbar post_event end-->

                            <div class="posts-section">

                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images/clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Senior Wordpress Developer</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="" style="background:grey;">Zone</a></li>
                                            <li><a href="#" title="">Accepted</a></li>
                                            <li><span>$150 / pers</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus
                                            hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet...
                                            <a href="#" title="">view more</a></p>
                                        <br>
                                        <img src="http://via.placeholder.com/57x57" style="margin-right:8px;" alt="">
                                        <img src="http://via.placeholder.com/57x57" alt="">
                                    </div>
                                    <div class="job-status-bar">
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div>
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="http://via.placeholder.com/50x50" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images/clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Senior Wordpress Developer</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="" style="background:grey;">Zone</a></li>
                                            <li><a href="#" title="">Accepted</a></li>
                                            <li><span>$150 / pers</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus
                                            hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet...
                                            <a href="#" title="">view more</a></p>
                                        <br>
                                        <img src="http://via.placeholder.com/57x57" style="margin-right:8px;" alt="">
                                        <img src="http://via.placeholder.com/57x57" alt="">
                                    </div>
                                    <div class="job-status-bar">
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div>
                                <!--post-bar end-->

                                <!-- <div class="process-comm">
                                                      <div class="spinner">
                                                            <div class="bounce1"></div>
                                                            <div class="bounce2"></div>
                                                            <div class="bounce3"></div>
                                                      </div>
                                                </div> -->
                                <!--process-comm loader end-->

                            </div>
                            <!--posts-section end-->

                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <!--main-ws-sec centrale_pane end-->


                    <!--=========== Section =============
                                                      RIGHT PANE
                              =============== =============-->
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <div class="widget widget-about">
                                <img src="images/01_Icon-Community@2x.png" alt="" style="width:45px; height:65px;">
                                <h3>Get a look </h3>
                                <span>Totally Free</span>
                                <div class="sign_link" <h3><a href="#" title="">Sign up</a></h3>
                                    <!-- <a href="#" title="">Learn about us</a> -->
                                </div>
                            </div>
                            <!--widget-about end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Most Viewed Events</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <!--job-info end-->
                                </div>
                                <!--jobs-list end-->
                            </div>
                            <!--widget-jobs end-->
                            <!--widget-event end-->
                        </div>
                    </div>
                    <!--right-sidebar right_pane end-->


                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>

<div class="chatbox-list">
    <div class="chatbox">
        <div class="chat-mg bx">
            <a href="#" title=""><img src="images/chat.png" alt=""></a>
            <span>2</span>
        </div>
        <div class="conversation-box">
            <div class="con-title">
                <h3>Messages</h3>
                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
            </div>
            <div class="chat-list">
                <div class="conv-list active">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <span class="active-status activee"></span>
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>1:55 PM</span>
                    </div>
                    <span class="msg-numbers">2</span>
                </div>
                <div class="conv-list">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>11:39 PM</span>
                    </div>
                </div>
                <div class="conv-list">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>0.28 AM</span>
                    </div>
                </div>
            </div>
            <!--chat-list end-->
            <div class="typing-msg">
                <form>
                    <textarea placeholder="Type a message here"></textarea>
                    <button type="submit"><i class="fa fa-send"></i></button>
                </form>
                <ul class="ft-options">
                    <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                    <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                </ul>
            </div>
            <!--typing-msg end-->
        </div>
        <!--conversation-box end-->
    </div>
</div>
<!--chatbox-list end-->

<!-- <div class="post-popup pst-pj">
      <div class="post-project">
            <h3>Post a project</h3>
            <div class="post-project-fields">
                  <form>
                        <div class="row">
                              <div class="col-lg-12">
                                    <input type="text" name="title" placeholder="Title">
                              </div>
                              <div class="col-lg-12">
                                    <div class="inp-field">
                                          <select>
                                                <option>Category</option>
                                                <option>Category 1</option>
                                                <option>Category 2</option>
                                                <option>Category 3</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-lg-12">
                                    <input type="text" name="skills" placeholder="Skills">
                              </div>
                              <div class="col-lg-12">
                                    <div class="price-sec">
                                          <div class="price-br">
                                                <input type="text" name="price1" placeholder="Price">
                                                <i class="la la-dollar"></i>
                                          </div>
                                          <span>To</span>
                                          <div class="price-br">
                                                <input type="text" name="price1" placeholder="Price">
                                                <i class="la la-dollar"></i>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-lg-12">
                                    <textarea name="description" placeholder="Description"></textarea>
                              </div>
                              <div class="col-lg-12">
                                    <ul>
                                          <li><button class="active" type="submit" value="post">Post</button></li>
                                          <li><a href="#" title="">Cancel</a></li>
                                    </ul>
                              </div>
                        </div>
                  </form>
            </div><
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
      </div>
</div> -->
<!--post-project-popup project end-->
<!-- <div class="post-popup job_post">
      <div class="post-project">
            <h3>Post a job</h3>
            <div class="post-project-fields">
                  <form>
                        <div class="row">
                              <div class="col-lg-12">
                                    <input type="text" name="title" placeholder="Title">
                              </div>
                              <div class="col-lg-12">
                                    <div class="inp-field">
                                          <select>
                                                <option>Category</option>
                                                <option>Category 1</option>
                                                <option>Category 2</option>
                                                <option>Category 3</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-lg-12">
                                    <input type="text" name="skills" placeholder="Skills">
                              </div>
                              <div class="col-lg-6">
                                    <div class="price-br">
                                          <input type="text" name="price1" placeholder="Price">
                                          <i class="la la-dollar"></i>
                                    </div>
                              </div>
                              <div class="col-lg-6">
                                    <div class="inp-field">
                                          <select>
                                                <option>Full Time</option>
                                                <option>Half time</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-lg-12">
                                    <textarea name="description" placeholder="Description"></textarea>
                              </div>
                              <div class="col-lg-12">
                                    <ul>
                                          <li><button class="active" type="submit" value="post">Post</button></li>
                                          <li><a href="#" title="">Cancel</a></li>
                                    </ul>
                              </div>
                        </div>
                  </form>
            </div>
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
      </div>
</div> -->
<!--post-project-popup job end-->


@endsection
