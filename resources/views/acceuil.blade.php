@extends('layouts.app',['title'=>'Accueil'])

@push('styles')
<style>
.annonce{
    animation: marquee 15s linear infinite;
}
.marquee-rtl {
  overflow: hidden;
}
.usr-pic > img{
    width: 100px;
    height: 100px;
}
.usy-dt > img{
    width: 50px;
    height: 50px;
}
.user-profy > img{
    width: 57px;
    height: 57px;
}
.marquee-rtl > span {
  padding-bottom: 5px;
  display: inline-block;                /* modèle de boîte en ligne */
  color: #51a39b;
  text-shadow: #A3A3A3 6px 2px 4px;
  padding-right: 2em;                   /* un peu d'espace pour la transition */
  padding-left: 100%;                   /* placement à droite du conteneur */
  white-space: nowrap;                  /* pas de passage à la ligne */
  animation: defilement-rtl 15s infinite linear;
}
@keyframes defilement-rtl {
  0% {
    transform: translate3d(0,0,0);      /* position initiale à droite */
  }
  100% {
    transform: translate3d(-100%,0,0);  /* position finale à gauche */
  }
}
</style>
@endpush
@section('content')

@php
 $today = new DateTime();
@endphp

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
                                            <img src="{{asset('images/admin_default.jpg')}}" alt="">
                                        </div>
                                    </div>
                                    <!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>{{$manager->name}}</h3>
                                        <span>Administrateur du site</span>
                                    </div>
                                </div>
                                <!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <a href="/site-managment" title="">Gerer le Site</a>
                                    </li>
                                </ul>
                            </div>
                            <!--user-data end-->


                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="/zones-voir" title="">Zones</a></li>
                                    <li><a href="/membres-voir" title="">Membres</a></li>
                                    <li><a href="#" title="">Regles du groupe</a></li>
                                    <li><a href="#" title="">A propos de la communauté</a></li>
                                    <li><a href="/contact" title="">Contacter un delegué</a></li>
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
                                <h3>Bureau Executif</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div>
                            <div class="profiles-slider">
                                @if ($mem_bureaux != null)
                                    @foreach($mem_bureaux as $bureau)
                                        @php
                                        $role = preg_split('/"/',$bureau->getRoleNames())[1]
                                        @endphp

                                        <div class="user-profy">
                                            @if ($bureau->url_photo == null)
                                                <img src="{{asset('images/bureau_default2.jpg')}}" alt="">
                                            @else
                                                <img src="{{asset('uploads/profils/'.$bureau->url_photo)}}" alt="">
                                            @endif
                                            <h3>{{$bureau->name}}</h3>
                                            <span>{{explode('_', $role)[1]}}</span>
                                            <ul>
                                                <li><a href="#" title="" class="followw">695347568</a></li>
                                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
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

                            <div class="post-topbar marquee-rtl">
                                @if ($collecte_en_cour != null)
                                <span>Une nouvelle collecte a été lancé ...</span>
                                @endif
                                <div class="user-picy">
                                    <img src="images/de-live_venue3326_admin.png" style="width:50px;height:50px;"
                                        alt="">
                                </div>
                                <div class="post-st">
                                    <ul>
                                        @if ($collecte_en_cour != null)
                                            <li><a class="" href="/collectes" title="">Voir les participations</a></li>
                                        @endif
                                        <li><a class="" href="/evenements" title="">Liste des evenements</a></li>
                                    </ul>
                                </div>
                                <!--post-st end-->
                            </div>
                            <!--post-topbar post_event end-->

                            <div class="posts-section">

                               @foreach($events as $event)
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            @if ($event->membre->url_photo == null)
                                                <img src="{{asset('images/user_default.jpg')}}" alt="">
                                            @else
                                                <img src="{{asset('uploads/profils/'.$event->membre->url_photo)}}" alt="">
                                            @endif
                                            <div class="usy-name">
                                                <h3>{{$event->membre->name}}</h3>
                                                <span><img src="images/clock.png" alt="">
                                                   il y a {{ $event->created_at->diff($today)->format('%a') }} jours
                                                </span>
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
                                        <h3>{{Str::limit($event->titre, 50)}}</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="" style="background:grey;">{{$event->membre->zone->localisation}}</a></li>


                                                @if ($event->date_acceptation == null)
                                                    <li><a href="#" title="" style="background:#FFEEAD;">En attente de décision</a></li>
                                                @elseif ($event->date_acceptation != null && $event->statut == 1)
                                                    <li><a href="#" title="" style="background:#28FFBF;">Accepté</a></li>
                                                @else
                                                    <li><a href="#" title="" style="background:#FF6363;">Rejeté</a></li>
                                                @endif
                                            </a></li>
                                        </ul>
                                        <p>
                                          {{Str::limit($event->description, 150)}}
                                          <a href="{{route('details',[$event->id])}}" title="">voir la suite</a>
                                        </p>
                                        <br>
                                        <img src="http://via.placeholder.com/57x57" style="margin-right:8px;" alt="">
                                        <img src="http://via.placeholder.com/57x57" alt="">
                                    </div>
                                    <div class="job-status-bar">
                                        <a><i class="la la-eye"></i>Vues {{$event->nombre_vues}}</a>
                                    </div>
                                </div>

                               @endforeach

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
                                <h3>Venez decouvrir</h3>
                                <span>Jetez un coup d'oeil</span>
                                <div class="sign_link" <h3><a href="#" title="">Inscription</a></h3>
                                    <!-- <a href="#" title="">Learn about us</a> -->
                                </div>
                            </div>
                            <!--widget-about end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Evenements populaires</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
                                   @foreach($event_abstract as $event)
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>{{ Str::limit($event->titre, 20) }}</h3>
                                            <p>{{Str::limit($event->description, 50)}}</p>
                                        </div>
                                        <div class="hr-rate" style="display:flex; flex-direction:column; justify-content:center;align-items:center;">
                                            <span style="margin-bottom:5px;">vues</span>
                                            <span style="color:#e44d3a;">{{$event->nombre_vues}}</span>
                                        </div>
                                    </div>
                                    <!--job-info end-->
                                    @endforeach

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

{{-- <div class="chatbox-list">
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
</div> --}}
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
