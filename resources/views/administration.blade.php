@extends('layouts.app',['title'=>'Manage Site'])
@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/preview.css')}}">
<style media="screen">

</style>
@endpush
@push('scripts')
<script src="{{ asset('/js/preview.js') }}"></script>
<script src="{{ asset('/js/postevent.js') }}"></script>
<script type="text/javascript">
   $('.fund-item').hide();
   $('.fund-op1').click(function(){
      $('.fund-item').hide();
      $('.fund-item.op1').show();
   });
   $('.fund-op2').click(function(){
      $('.fund-item').hide();
      $('.fund-item.op2').show();
   });
   $('.fund-op3').click(function(){
      $('.fund-item').hide();
      $('.fund-item.op3').show();
   });
   $('.fund-op4').click(function(){
      $('.fund-item').hide();
      $('.fund-item.op4').show();
   })
   $('.fund-op5').click(function(){
      $('.fund-item').hide();
      $('.fund-item.op5').show();
   })
</script>
@endpush

@section('content')

<section class="profile-account-setting">
    <div class="container">
        <div class="account-tabs-setting">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link" id="nav-entities-tab" data-toggle="tab" href="#nav-entities"
                                role="tab" aria-controls="nav-entities" aria-selected="false"><i
                                    class="la la-cogs"></i>Ajouter des Membres</a>

                            <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests"
                            role="tab" aria-controls="nav-requests" aria-selected="false"><i
                                class="fa fa-user-secret"></i>Ajouter compte admin</a>

                            <a class="nav-item nav-link" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab"
                            aria-controls="nav-acc" aria-selected="true"><i class="la la-cogs"></i>Reinitialiser
                            un compte</a>

                            <a class="nav-item nav-link" id="nav-status-tab"
                            data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status"
                            aria-selected="false"><i class="fa fa-line-chart"></i>Gestion des comptes</a>

                            <a class="nav-item nav-link" id="nav-password-tab"
                                data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password"
                                aria-selected="false"><i class="fa fa-lock"></i>Poster un evenement</a>

                            <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                href="#nav-notification" role="tab" aria-controls="nav-notification"
                                aria-selected="false"><i class="fa fa-flash"></i>Valider un evenement</a>

                            <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#nav-crowfund" role="tab"
                                aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Collecte de fond</a>

                            

                            <a class="nav-item nav-link" id="nav-rules-tab" data-toggle="tab" href="#nav-rules"
                                role="tab" aria-controls="nav-rules" aria-selected="false"><i
                                    class="fa fa-group"></i>Regles du groupe</a>
                        </div>
                    </div>
                    <!--acc-leftbar end-->
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">

                        {{-- manage account --}}
                        <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>Liste des membres</h3>
                                <div>
                                    <table class="table">
                                        <thead class="" style="background:#E44D3A">
                                            <tr>
                                                <th scope="col" style="width: 10%">Matricule</th>
                                                <th scope="col" style="width: 10%">Zone</th>
                                                <th scope="col" style="width: 25%">Noms & prenoms</th>
                                                <th scope="col" style="width: 55%">Role & Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td class="job-dt">
                                                    <li><a href="#" title="" style="background:gold;">C. Sage</a></li>
                                                    <li><a href="#" title="" style="">activé</a></li>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="job-dt">
                                                    <li><a href="#" title="" style="background:rgb(9, 179, 179);">B. executif</a></li>
                                                    {{-- <li><a href="#" title="" style="background:#303281;">delegate</a> </li>--}}
                                                    <li><a href="#" title="" style="">activé</a></li>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td class="job-dt">
                                                    <li><a href="#" title="" style="background:grey;">desactivé</a> </li>
                                                    {{-- <li><a href="#" title="">activate</a></li> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td class="job-dt">
                                                    <li><a href="#" title="" style="background:grey;">desactivé</a></li>
                                                    {{-- <li><a href="#" title="">activate</a></li> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td class="job-dt">
                                                    {{-- <li><a href="#" title="">activate</a></li> --}}
                                                    <li><a href="#" title="" style="background:#303281;">delegué</a></li>
                                                    <li><a href="#" title="" style="">activé</a></li>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table end-->

                                <div class="pagination" style="">
                                    <a href="#">&laquo;</a>
                                    <a href="#">1</a>
                                    <a class="active" href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#">6</a>
                                    <a href="#">&raquo;</a>
                                </div>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- reinitialize account --}}
                        <div class="tab-pane fade" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>Reinitialiser un compte</h3>
                                <form>
                                    <div class="cp-field">
                                        <h5>Matricule du compte</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="old-password" placeholder="entrer le matricule">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Nom et Prenom (Nouveau)</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="new-password" placeholder="entrer le Nom complet">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Zone (Nouveau)</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="repeat-password" placeholder="entrer la zone">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Enregistrer</button></li>
                                            <li><button type="submit">Reinitialiser le formulaire</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- new zone and member --}}
                        <div class="tab-pane fade" id="nav-entities" role="tabpanel" aria-labelledby="nav-entities-tab">
                            <div class="acc-setting">
                                <h3>Ajouter Membres & Zones</h3>
                                <form action="{{url('ajouter-zone')}}" method="POST">
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Nom de la zone</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="localisation" placeholder="Nom complet">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Identifiant de la zone</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="identifiant"
                                                placeholder="Identifiant (03 lettres)">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Ajouter</button></li>
                                        </ul>
                                    </div>
                                </form>
                                <div class="acc-setting" style="border-bottom: 1px solid gray"></div>

                                <form action="{{url('ajouter-membre')}}" method="POST">
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Nom du Membre</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="name" placeholder="Nom du nouveau membre">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Numero de telephone</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="telephone" placeholder="Num telephone">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Date d'inscription effective <small>(après payement des frais
                                                d'inscription)</small></h5>
                                        <div class="cpp-fiel">
                                            <input type="date" name="registered_date" placeholder="Num telephone">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Selectionner la zone où le membre reside</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="zone">
                                                <option selected>Choose...</option>
                                                @foreach($zones as $zone)
                                                <option value="{{$zone}}"> {{ $zone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Est-il delegué de sa zone ?</h5>
                                        <div class="checky-sec">
                                            <div class="fgt-sec" style="margin-right:15px;">
                                                <input type="radio" name="deleguate" id="c1" value="1">
                                                <label for="c1">
                                                    <span></span>
                                                </label>
                                                <small>Oui</small>
                                            </div>
                                            <div class="fgt-sec">
                                                <input type="radio" name="deleguate" id="c2" value="0">
                                                <label for="c2">
                                                    <span></span>
                                                </label>
                                                <small>Non</small>
                                            </div>
                                            <!--fgt-sec end-->
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Ajouter </button></li>
                                            <li><button type="submit">Annuler</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- add event --}}
                        <div class="tab-pane fade " id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <div class="acc-setting">
                                <h3>Nouvel Evenement</h3>
                                <form action="{{url('ajouter-evenement')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="cp-field">
                                        <h5>Ajouter un titre a cet evenement </h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="titre" placeholder="Donnez lui un nom">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Nom du membre concerné par l'evenement</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="membre"
                                                placeholder="La personne qui à l'evenement">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Saisir une description de l'evenement</h5>
                                        <textarea name="description"></textarea>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Qualificatif de l'evenemet</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="qualificatif">
                                                <option value="Heureux" selected>Heureux</option>
                                                <option value="Malheureux">Malheureux</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Ajouter quelques photos et videos</h5>
                                        <div class="form-group">
                                            <div class="input-group col-md-12">
                                                <input style="height:38px;width:140px;border-radius:7px 0 0 7px;"
                                                    id="fakeUploadLogo" class="form-control fake-shadow"
                                                    placeholder="Choose File" disabled="disabled">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-danger fake-shadow"
                                                        style="border-radius:0 7px 7px 0!important;">
                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload
                                                            Logo</span>
                                                        <input class="attachment_upload" id="logo-id" name="filenames[]"
                                                            type="file" accept="image/png, image/jpeg, image/jpg" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="help-block" style="margin-top:10px;">* Upload your products image.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Enregistrer l'evenement</button></li>

                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- valider un event --}}
                        <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>Evenement soumis   
                                    <span  style="font-size:13px;font-family:system-ui;">Accepter/decliner</span> 
                                </h3>
                                <div class="requests-list">
                                    @if (count($events) >= 1)
                                    @foreach($events as $evt)
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>{{$evt->membre->name}}</h3>
                                            <span>{{$evt->titre}}</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req"
                                                        style="background:transparent;padding:0;width:30px;"><i
                                                            style="color:#4CAF50;" class="la la-check"></i></button>
                                                </li>
                                                <li><button type="submit" class="close-req"><i style="color:red;"
                                                            class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="request-details nothings"
                                        style="height:390px;display:flex;flex-direction:row;justify-content:center;align-items:center;">
                                        <div class="request-info">
                                            <h2 style="font-weight:bold;">Toute les demandes d'evenement ont deja été
                                                traité !!</h2>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!--requests-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- crown  fund --}}
                        <div class="tab-pane fade" id="nav-crowfund" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>
                                   Collecte de fond
                                   <span class="fundlist" style="margin-top:10px;margin-left:10px;padding:5px;font-size:12px;border-radius:11px;border: 1px inset orange;">
                                        @if($collecte_en_cour != null)  
                                            pour {{Str::limit($collecte_en_cour->evenement->titre,50)}}
                                        @else
                                            aucune collecte en cours
                                        @endif
                                   </span>
                                </h3>
                                <div class="profile-bx-details">
                                    <div class="row">
                                       <div class="col-lg-3 col-md-6 col-sm-12">
                                           <div class="profile-bx-info" >
                                               <div class="pro-bx" style="margin-bottom: 7px;">
                                                   <img src="images/pro-icon1.png" alt="">
                                                   <div class="bx-info">
                                                       <h3>Fcfa</h3>
                                                       <h5>Operations</h5>
                                                   </div>
                                               </div>
                                               <!--pro-bx end-->
                                               <div class="pro-bx" style="padding:1px 0px;margin-top:0px;">
                                                 <p class="fund-op1" style="color:#F4390B;font-size:12px;cursor:pointer;">Lancer une collecte</p>
                                               </div>
                                               <div class="pro-bx" style="padding:1px 0px;">
                                                 <p class="fund-op2" style="color:#F4390B;font-size:12px;cursor:pointer;">Jumuler collectes</p>
                                               </div>
                                               <div class="pro-bx" style="padding:1px 0px;">
                                                 <p class="fund-op3" style="color:#F4390B;font-size:12px;cursor:pointer;">Enregistrer participation</p>
                                               </div>
                                           </div>
                                           <!--profile-bx-info end-->
                                       </div>
                                       <div class="col-lg-3 col-md-6 col-sm-12">
                                           <div class="profile-bx-info">
                                               <div class="pro-bx">
                                                   <img src="images/pro-icon1.png" alt="">
                                                   <div class="bx-info">
                                                       <h3>5,145F</h3>
                                                        <h5>Revenue</h5>
                                                   </div>
                                                   <!--bx-info end-->
                                               </div>
                                               <!--pro-bx end-->
                                               <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                               <p class="fundlist">Nous vous remercions tous !!</p>
                                           </div>
                                           <!--profile-bx-info end-->
                                       </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon2.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>4,745</h3>
                                                        <h5>Participants</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                <p class="fundlist fund-op4">Voir list contributeurs</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon3.png" alt="">
                                                    <div class="bx-info">
                                                        <h3>1,145</h3>
                                                        <h5>Beneficiaires</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                <p class="fundlist fund-op5">Voir list Beneficiaires</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                    </div>
                                </div>

                                <div class="" style="margin-top:15px;float:left;">
                                   <!-- fonction crown fund-->
                                   <!-- <div class="acc-setting" style="border-bottom: 1px solid gray;margin-bottom:20px;"></div> -->
                                   <!--lancer cotisation-->
                                   <div class="pro-work-status fund-item op1" style="padding-bottom:20px;">
                                       <h4 style="margin-bottom:7px;color:#e44d3a;">Nouvelle collecte de fond  </h4>
                                       <form action="{{url('lancer-collecte')}}" method="POST">
                                           @csrf
                                           <div class="row">
                                              <div class="cp-field col-md-8" style="position:relative;padding-left:0;margin-top:10px;">
                                                  <h5>Titre de l'evenement</h5>
                                                  <div class="cpp-fiel">
                                                      <input type="text" name="titre" placeholder="Rechercher l'evenement">
                                                      <i class="fa fa-lock"></i>
                                                  </div>
                                                  <button type="submit" class="btn btn-outline-primary" style="position:absolute;float:right;bottom:0;padding:5px;margin-left:15px;width:100px;">
                                                   <i style="color:#4CAF50;" class="la la-check"></i> <span style="color:navy;margin-left:8px;">Lancer</span>
                                                  </button>
                                              </div>
                                           </div>
                                       </form>
                                   </div>

                                   <!--jumuler event sur cotisation-->
                                   <div class="pro-work-status fund-item op2" style="padding-bottom:20px;">
                                     <h4 style="margin-bottom:15px;color:#e44d3a;">Ajouter un evenement a une collecte en cours  </h4>
                                     <form action="{{url('mixer-collecte')}}" method="POST">
                                         @csrf
                                         <div class="row" style="position:relative;">

                                            <div class="cp-field col-md-5" style="padding-left:0;margin-top:8px;">
                                                <h5>Selectionner une collecte en cours</h5>
                                                <div class="cpp-fiel">
                                                    <select id="inputState" class="form-control" name="collecte">
                                                       <option selected>Choose...</option>
                                                       @foreach($collectes as $collecte)
                                                       <option value="{{$collecte->id}}">Collecte pour {{ Str::limit($collecte->event_titre,20) }}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="cp-field col-md-5" style="margin-top:8px;">
                                                <h5>Selectionner l'evenement à rajouter</h5>
                                                <div class="cpp-fiel">
                                                    <select id="inputState" class="form-control" name="nouvel_event">
                                                       <option selected>Choose...</option>
                                                       @foreach($eventforfunds as $evt)
                                                       <option value="{{$evt->titre}}"> {{ Str::limit($evt->titre, 30) }}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="" style="position:absolute;right:0;bottom:0; background:transparent;padding:0;margin-left:15px;width:100px;">
                                             <i style="color:#4CAF50;" class="la la-check"></i> <span style="color:navy;margin-left:8px;">Ajouter</span>
                                            </button>
                                         </div>
                                     </form>
                                   </div>

                                   <!--enregister new participation-->
                                   <div class="pro-work-status fund-item op3" style="padding-bottom:20px;">
                                       <h4 style="margin-bottom:15px;color:#e44d3a;">Enregistre nouvelle participation</h4>
                                       <form action="{{url('nouvelle-participation')}}" method="POST">
                                           @csrf
                                           <div class="row">
                                              <div class="cp-field col-md-5" style="padding-left:0;margin-top:8px;">
                                                  <h5>Selectionner une collecte en cours</h5>
                                                  <div class="cpp-fiel">
                                                      <select id="inputState" class="form-control" name="collecte">
                                                         <option selected>Choose...</option>
                                                         @foreach($collectes as $collecte)
                                                         <option value="{{$collecte->id}}">Collecte pour {{ Str::limit($collecte->event_titre,20) }}</option>
                                                         @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="cp-field col-md-5" style="position:relative;padding-left:0;margin-top:8px;">
                                                  <h5>Nom du membre</h5>
                                                  <div class="cpp-fiel">
                                                      <input type="text" name="membre" placeholder="Rechercher le membre">
                                                      <i class="fa fa-lock"></i>
                                                  </div>
                                                  <button type="submit" class="" style="position:absolute;float:right;bottom:0;background:transparent;padding:0;margin-left:15px;width:120px;">
                                                   <i style="color:#4CAF50;" class="la la-check"></i> <span style="color:navy;margin-left:8px;">participer</span>
                                                  </button>
                                              </div>
                                           </div>
                                       </form>
                                   </div>

                                   <!-- consulter les participations -->
                                   <div class="pro-work-status fund-item op4" style="padding-bottom:20px;">
                                      <div class="row" style="float:left;">
                                        @if($collecte_en_cour != null)
                                            <h4 class="col-md-12" style="margin-bottom:15px;color:#e44d3a;">Liste des participations pour la cotisation de</h4>
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead class="" style="background:#E44D3A">
                                                        <tr>
                                                            <th scope="col" style="width: 20%">Matricule Memb.</th>
                                                            <th scope="col" style="width: 30%">Nom du Membre</th>
                                                            <th scope="col" style="width: 25%">Zone</th>
                                                            <th scope="col" style="width: 25%">Partcipation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($participants != null)
                                                        @foreach($participants as $pt)
                                                            <tr>
                                                                <th scope="row">{{$pt->membre->matricule}}</th>
                                                                <td>{{$pt->membre->name}}</td>
                                                                <td>{{$pt->membre->zone_name}}</td>
                                                                <td class="job-dt">
                                                                    <li><a href="#" title="">Oui</a>
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    {{-- @if($nonparticipants != null)
                                                        @foreach($nonparticipants as $npt)
                                                            <tr>
                                                                <th scope="row">{{$npt->matricule}}</th>
                                                                <td>{{$npt->name}}</td>
                                                                <td>{{$npt->zone_name}}</td>
                                                                <td class="job-dt">
                                                                    <li><a href="#" title="" style="background:#e44d3a;">Non</a>
                                                                    </li>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end table end-->

                                            <div class="pagination" style="margin-bottom:10px;">
                                                <a href="#">&laquo;</a>
                                                <a href="#">1</a>
                                                <a class="active" href="#">2</a>
                                                <a href="#">3</a>
                                                <a href="#">4</a>
                                                <a href="#">5</a>
                                                <a href="#">6</a>
                                                <a href="#">&raquo;</a>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-outline-warning" disabled>
                                                Participants
                                                <span class="badge badge-light" style="padding:10px;font-size:14px;">{{count($participants)}}</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-outline-success" disabled>
                                                Somme recollectée
                                                <span class="badge badge-light" style="padding:10px;font-size:14px;">
                                                    {{$collecte_en_cour->evenement->qualificatif == "Heureux" ? count($participants)*500 :  count($participants)*1000}}
                                                </span>
                                                </button>
                                            </div>
                                        @else
                                            <h4>Aucune collecte en cours</h4>
                                        @endif
                                      </div>
                                      <!--stats collecte-->
                                    </div>


                                    <!-- consulter les beneficiaires -->

                                   <div class="pro-work-status fund-item op5" style="padding-bottom:20px;">
                                      <div class="row" style="float:left;">
                                        @if($collecte_en_cour != null)
                                            <h4 class="col-md-12" style="margin-bottom:15px;color:#e44d3a;">Liste des beneficiaires de cette cotisation</h4>
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead class="" style="background:#E44D3A">
                                                        <tr>
                                                            <th scope="col" style="width: 20%">Matricule Memb.</th>
                                                            <th scope="col" style="width: 60%">Nom du Membre</th>
                                                            <th scope="col" style="width: 20%">Zone</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($beneficiaires != null)
                                                        @foreach($beneficiaires as $bf)
                                                            <tr>
                                                                <th scope="row">{{$bf->membre->matricule}}</th>
                                                                <td>{{$bf->membre->name}}</td>
                                                                <td>{{$bf->membre->zone_name}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            @else
                                                <h4>Aucune collecte en cours</h4>
                                            @endif
                                      </div>
                                      <!--benefciaires-->
                                    </div>

                                
                                
                                </div>
                            </div>
                        </div>

                       {{-- Admin roles --}}
                        <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>Roles des Utilisateur</h3>
                                <form action="{{url('definir-role')}}" method="POST">
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Entrer le nom de l'utilisateur</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="nom_membre" placeholder="Nom du membre">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Selectionner le role</h5>
                                        <div class="cpp-fiel">
                                            <select id="inputState" class="form-control" name="role_membre">
                                                <option selected>Choisir...</option>
                                                <optgroup label="Bureau Executif">
                                                    @foreach ($bureaux as $bureau)
                                                        <option value="{{$bureau->fonction}}">Bureux Exe. - {{$bureau->fonction}}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Conseil des Sages">
                                                    @foreach ($sages as $sage)
                                                        <option value="{{$sage->fonction}}">Conseil S. - {{$sage->fonction}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2" style="margin-top:50px;">
                                        <ul>
                                            <li><button type="submit">Enregister</button></li>
                                            <li><button type="submit">Annuler les changements</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        {{-- community rules --}}
                        <div class="tab-pane fade" id="nav-rules" role="tabpanel" aria-labelledby="nav-rules-tab">
                            <div class="acc-setting" style="min-height:448px;">
                                <h3>Regles du Groupe</h3>
                                <form>
                                    <div class="notbar">
                                        <h4>Notification Sound</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>
                                    <!--notbar end-->
                                    <div class="notbar">
                                        <h4>Notification Email</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>
                                    <!--notbar end-->
                                    <div class="notbar">
                                        <h4>Chat Message Sound</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium
                                            nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex
                                            euismod, posuere lectus id</p>
                                        <div class="toggle-btn">
                                            <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>
</section>

<template id="">
    <div class="request-details nothings"
        style="height:390px;display:flex;flex-direction:row;justify-content:center;align-items:center;">
        <div class="request-info">
            <h2 style="font-weight:bold;">Toute les demandes d'evenement ont deja été traité !!</h2>
        </div>
    </div>
</template>
<template>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam architecto officiis nihil totam incidunt eum perferendis cupiditate tempore dolore? Incidunt necessitatibus atque ipsa laborum tempora architecto aspernatur eligendi libero exercitationem quas, alias dicta unde reprehenderit, deserunt magni labore. Alias ipsa molestias incidunt nobis sunt quod ex! Deleniti nulla soluta ab.
</template>


{{-- footer --}}
@include('layouts.footer')
@endsection
