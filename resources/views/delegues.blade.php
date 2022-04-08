@extends('layouts.app',['title'=>'Liste des deleges'])

@section('content')

   <section class="companies-info">
         <div class="container">
               <div class="company-title">
                     <h3  style="background:aquamarine ;">Liste des delegues de zones</h3>
               </div><!--company-title end-->
               <div class="companies-list">
                     <div class="row">
                           @foreach($delegues as $del)
                           <div class="col-lg-3 col-md-4 col-sm-6">
                                 <div class="company_profile_info">
                                       <div class="company-up-info">
                                             <img src="http://via.placeholder.com/90x90" alt="">
                                             <h3>{{$del->name}}</h3>
                                             <h4>
                                                <span class="badge badge-warning" style="padding:8px;font-size:14px;">
                                                 Tel: {{$del->telephone}}
                                                </span>
                                             </h4>
                                             <ul>
                                                <li><a  title="" class="follow">{{$del->zone_name}}</a></li>
                                                <li><a  title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                                             </ul>

                                             <!-- <ul>
                                                   <li style=""><a href="#" title="" class="follow" style="padding-left:10px;padding-right:10px;height:30px; line-height:30px;	border-radius: 30px;">
                                                      zone : {{$del->zone_name}}
                                                   </a></li>
                                             </ul> -->
                                       </div>
                                 </div><!--company_profile_info end-->
                           </div>
                           @endforeach
                     </div>
               </div><!--companies-list end-->

               <!-- <div class="process-comm">
                     <div class="spinner">
                           <div class="bounce1"></div>
                           <div class="bounce2"></div>
                           <div class="bounce3"></div>
                     </div>
               </div> -->
               <!--process-comm end-->
         </div>
   </section><!--companies-info end-->

   {{-- footer --}}
   {{-- @include('layouts.footer') --}}

@endsection
