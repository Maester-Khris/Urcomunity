@extends('layouts.app',['title'=>'Liste des zones'])

@section('content')

   <section class="companies-info">
         <div class="container">
               <div class="company-title">
                     <h3  style="background:limegreen;">Liste des zones enregistrées</h3>
               </div><!--company-title end-->
               <div class="companies-list">
                     <div class="row">
                           @foreach($zones as $zone)
                           <div class="col-lg-3 col-md-4 col-sm-6">
                                 <div class="company_profile_info">
                                       <div class="company-up-info">
                                             <img src="http://via.placeholder.com/90x90" alt="">
                                             <h3>{{$zone->localisation}} - {{$zone->identifiant}}</h3>
                                             <h4 style="margin-bottom: 10px;">
                                                <span class="badge badge-info" style="padding:8px;font-size:14px;">
                                                      Nombre de membres: {{count($zone->membres)}}
                                                </span>
                                             </h4>
                                             <ul>
                                                   <li style=""><a href="#" title="" class="follow" style="font-weight:bold;padding-left:10px;padding-right:10px;height:30px;line-height:30px;background:#FFC107;">
                                                      Num délégué: {{$zone->delegue_num['telephone']}}
                                                   </a></li>
                                             </ul>
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
