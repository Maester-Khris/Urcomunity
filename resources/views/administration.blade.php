@extends('layouts.app',['title'=>'Manage Site'])
@push('styles')
      <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/preview.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('/js/preview.js') }}"></script>
@endpush

@section('content')

      <section class="profile-account-setting">
            <div class="container">
                  <div class="account-tabs-setting">
                        <div class="row">
                              <div class="col-lg-3">
                                    <div class="acc-leftbar">
                                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-cogs"></i>Account Setting</a>
                                                <a class="nav-item nav-link" id="nav-acc-tab" data-toggle="tab" href="#nav-entities" role="tab" aria-controls="nav-entities" aria-selected="true"><i class="la la-cogs"></i>Add Entities</a>
                                                <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Post event</a>
                                                <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-flash"></i>Validate event</a>
                                                <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false"><i class="fa fa-user-secret"></i>Set Groupe roles</a>
                                                <a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#nav-rules" role="tab" aria-controls="security-login" aria-selected="false"><i class="fa fa-group"></i>Set Groupe rules</a>
                                                <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#nav-crowfund" role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Crown Fund</a>
                                                <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-line-chart"></i>Manage Account</a>
                                          </div>
                                    </div>
                                    <!--acc-leftbar end-->
                              </div>
                              <div class="col-lg-9">
                                    <div class="tab-content" id="nav-tabContent">

                                          <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                                                <div class="acc-setting">
                                                      <h3>Reset account</h3>
                                                      <form>
                                                            <div class="cp-field">
                                                                  <h5>Old Password</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="old-password" placeholder="Old Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>New Password</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="new-password" placeholder="New Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Repeat Password</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="repeat-password" placeholder="Repeat Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="save-stngs pd2">
                                                                  <ul>
                                                                        <li><button type="submit">Save Setting</button></li>
                                                                        <li><button type="submit">Restore Setting</button></li>
                                                                  </ul>
                                                            </div>
                                                            <!--save-stngs end-->
                                                      </form>
                                                </div>
                                                <!--acc-setting end-->
                                          </div>

                                          {{-- new zone and member --}}
                                          <div class="tab-pane fade show" id="nav-entities" role="tabpanel" aria-labelledby="nav-acc-tab">
                                                <div class="acc-setting">
                                                      <h3>Add Member & Zones</h3>
                                                      <form  action="{{url('ajouter-zone')}}" method="POST">
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
                                                                        <input type="text" name="identifiant" placeholder="Identifiant (03 lettres)">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="save-stngs pd2">
                                                                  <ul>
                                                                        <li><button type="submit">Ajouter</button></li>
                                                                  </ul>
                                                            </div>
                                                      </form>
                                                      <div class="acc-setting" style="border: 1px solid gray">

                                                      </div>
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
                                                                  <h5>Date d'inscription effective <small>(après payement des frais d'inscription)</small></h5>
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
                                                                                <option value="{{$zone}}" > {{ $zone }}</option>
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
                                                                     </div><!--fgt-sec end-->
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

                                          <!-- add event  -->
                                          <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
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
                                                                        <input type="text" name="membre" placeholder="La personne qui à l'evenement">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Saisir une description de l'evenement</h5>
                                                                  <textarea name="description"></textarea>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>qualificatif de l'evenemet</h5>
                                                                  <div class="cpp-fiel">
                                                                        <select id="inputState" class="form-control" name="qualificatif">
                                                                              <option value="Heureux" selected>Heureux</option>
                                                                              <option value="Malheureux" >Malheureux</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Ajouter quelques photos et videos</h5>
                                                                  <div class="form-group">
                                                                    <div class="input-group col-md-12" >
                                                                       <input style="height:38px;width:140px;border-radius:7px 0 0 7px;" id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                                                                       <div class="input-group-btn" >
                                                                         <div class="fileUpload btn btn-danger fake-shadow" style="border-radius:0 7px 7px 0!important;">
                                                                          <span ><i class="glyphicon glyphicon-upload"></i> Upload Logo</span>
                                                                          <input class="attachment_upload" id="logo-id" name="filenames[]" type="file" accept="image/png, image/jpeg*" multiple >
                                                                         </div>
                                                                       </div>
                                                                    </div>
                                                                    <p class="help-block" style="margin-top:10px;">* Upload your products image.</p>
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

                                          <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
                                                <div class="acc-setting">
                                                      <h3>Submitted event <span style="font-size:13px;font-family:system-ui;">Accept/decline</span> </h3>
                                                      <div class="requests-list">
                                                            <div class="request-details">
                                                                  <div class="noty-user-img">
                                                                        <img src="http://via.placeholder.com/35x35" alt="">
                                                                  </div>
                                                                  <div class="request-info">
                                                                        <h3>Jessica William</h3>
                                                                        <span>Graphic Designer</span>
                                                                  </div>
                                                                  <div class="accept-feat">
                                                                        <ul>
                                                                              <li><button type="submit" class="accept-req">Accept</button></li>
                                                                              <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                                                        </ul>
                                                                  </div>
                                                                  <!--accept-feat end-->
                                                            </div>
                                                            <!--request-detailse end-->
                                                            <div class="request-details">
                                                                  <div class="noty-user-img">
                                                                        <img src="http://via.placeholder.com/35x35" alt="">
                                                                  </div>
                                                                  <div class="request-info">
                                                                        <h3>John Doe</h3>
                                                                        <span>PHP Developer</span>
                                                                  </div>
                                                                  <div class="accept-feat">
                                                                        <ul>
                                                                              <li><button type="submit" class="accept-req">Accept</button></li>
                                                                              <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                                                        </ul>
                                                                  </div>
                                                                  <!--accept-feat end-->
                                                            </div>
                                                            <!--request-detailse end-->
                                                            <div class="request-details">
                                                                  <div class="noty-user-img">
                                                                        <img src="http://via.placeholder.com/35x35" alt="">
                                                                  </div>
                                                                  <div class="request-info">
                                                                        <h3>Poonam</h3>
                                                                        <span>Wordpress Developer</span>
                                                                  </div>
                                                                  <div class="accept-feat">
                                                                        <ul>
                                                                              <li><button type="submit" class="accept-req">Accept</button></li>
                                                                              <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                                                        </ul>
                                                                  </div>
                                                                  <!--accept-feat end-->
                                                            </div>
                                                            <!--request-detailse end-->
                                                            <div class="request-details">
                                                                  <div class="noty-user-img">
                                                                        <img src="http://via.placeholder.com/35x35" alt="">
                                                                  </div>
                                                                  <div class="request-info">
                                                                        <h3>Bill Gates</h3>
                                                                        <span>C & C++ Developer</span>
                                                                  </div>
                                                                  <div class="accept-feat">
                                                                        <ul>
                                                                              <li><button type="submit" class="accept-req">Accept</button></li>
                                                                              <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                                                        </ul>
                                                                  </div>
                                                                  <!--accept-feat end-->
                                                            </div>
                                                            <!--request-detailse end-->
                                                            <div class="request-details">
                                                                  <div class="noty-user-img">
                                                                        <img src="http://via.placeholder.com/35x35" alt="">
                                                                  </div>
                                                                  <div class="request-info">
                                                                        <h3>Jessica William</h3>
                                                                        <span>Graphic Designer</span>
                                                                  </div>
                                                                  <div class="accept-feat">
                                                                        <ul>
                                                                              <li><button type="submit" class="accept-req">Accept</button></li>
                                                                              <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                                                        </ul>
                                                                  </div>
                                                                  <!--accept-feat end-->
                                                            </div>
                                                            <!--request-detailse end-->

                                                      </div>
                                                      <!--requests-list end-->
                                                </div>
                                                <!--acc-setting end-->
                                          </div>

                                          <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                                                <div class="acc-setting">
                                                      <h3>Member Roles</h3>
                                                      <form>
                                                            <div class="cp-field">
                                                                  <h5>Add a role</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="old-password" placeholder="Old Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Select the Type of role</h5>
                                                                  <div class="cpp-fiel">
                                                                        <select id="inputState" class="form-control">
                                                                              <option selected>Choose...</option>
                                                                              <option>...</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="save-stngs pd2">
                                                                  <ul>
                                                                        <li><button type="submit">Save Setting</button></li>
                                                                        <li><button type="submit">Restore Setting</button></li>
                                                                  </ul>
                                                            </div>
                                                            <!--save-stngs end-->
                                                      </form>
                                                </div>
                                                <!--acc-setting end-->
                                          </div>

                                          <div class="tab-pane fade" id="nav-rules" role="tabpanel" aria-labelledby="nav-requests-tab">
                                                <div class="acc-setting">
                                                      <h3>Group rules</h3>
                                                      <form>
                                                            <div class="notbar">
                                                                  <h4>Notification Sound</h4>
                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                                                  <div class="toggle-btn">
                                                                        <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                                                  </div>
                                                            </div>
                                                            <!--notbar end-->
                                                            <div class="notbar">
                                                                  <h4>Notification Email</h4>
                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                                                  <div class="toggle-btn">
                                                                        <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                                                  </div>
                                                            </div>
                                                            <!--notbar end-->
                                                            <div class="notbar">
                                                                  <h4>Chat Message Sound</h4>
                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
                                                                  <div class="toggle-btn">
                                                                        <a href="#" title=""><img src="images/up-btn.png" alt=""></a>
                                                                  </div>
                                                            </div>
                                                            <!--notbar end-->
                                                            <div class="save-stngs">
                                                                  <ul>
                                                                        <li><button type="submit">Save Setting</button></li>
                                                                        <li><button type="submit">Restore Setting</button></li>
                                                                  </ul>
                                                            </div>
                                                            <!--save-stngs end-->
                                                      </form>
                                                </div>
                                                <!--acc-setting end-->
                                          </div>

                                          <div class="tab-pane fade" id="nav-crowfund" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                                                <div class="acc-setting">
                                                      <h3>Crow Fund for event</h3>
                                                      <div class="profile-bx-details">
                                                            <div class="row">
                                                                  <div class="col-lg-4 col-md-6 col-sm-12">
                                                                        <div class="profile-bx-info">
                                                                              <div class="pro-bx">
                                                                                    <img src="images/pro-icon1.png" alt="">
                                                                                    <div class="bx-info">
                                                                                          <h3>$5,145</h3>
                                                                                          <h5>Total Income</h5>
                                                                                    </div>
                                                                                    <!--bx-info end-->
                                                                              </div>
                                                                              <!--pro-bx end-->
                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                                              <p class="fundlist">We thank you all !!</p>
                                                                        </div>
                                                                        <!--profile-bx-info end-->
                                                                  </div>
                                                                  <div class="col-lg-4 col-md-6 col-sm-12">
                                                                        <div class="profile-bx-info">
                                                                              <div class="pro-bx">
                                                                                    <img src="images/pro-icon2.png" alt="">
                                                                                    <div class="bx-info">
                                                                                          <h3>4,745</h3>
                                                                                          <h5>Total participant</h5>
                                                                                    </div>
                                                                                    <!--bx-info end-->
                                                                              </div>
                                                                              <!--pro-bx end-->
                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                                              <p class="fundlist">See list of donator</p>
                                                                        </div>
                                                                        <!--profile-bx-info end-->
                                                                  </div>
                                                                  <div class="col-lg-4 col-md-6 col-sm-12">
                                                                        <div class="profile-bx-info">
                                                                              <div class="pro-bx">
                                                                                    <img src="images/pro-icon3.png" alt="">
                                                                                    <div class="bx-info">
                                                                                          <h3>1,145</h3>
                                                                                          <h5>Total beneficiary</h5>
                                                                                    </div>
                                                                                    <!--bx-info end-->
                                                                              </div>
                                                                              <!--pro-bx end-->
                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                                                              <p class="fundlist">See list of beneficiary</p>
                                                                        </div>
                                                                        <!--profile-bx-info end-->
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--profile-bx-details end-->
                                                      <div class="pro-work-status">
                                                            <!-- <h4>Work Status  -  Last Months Working Status</h4> -->
                                                      </div>
                                                      <!--pro-work-status end-->
                                                </div>
                                                <!--acc-setting end-->
                                          </div>

                                          <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                                                <div class="acc-setting">
                                                      <h3>List of member</h3>
                                                      <div>
                                                            <table class="table">
                                                                  <thead class="" style="background:#E44D3A">
                                                                        <tr>
                                                                              <th scope="col" style="width: 10%">Matricule</th>
                                                                              <th scope="col" style="width: 10%">Role</th>
                                                                              <th scope="col" style="width: 25%">Name</th>
                                                                              <th scope="col" style="width: 55%">Actions</th>
                                                                        </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                        <tr>
                                                                              <th scope="row">1</th>
                                                                              <td>Mark</td>
                                                                              <td>Otto</td>
                                                                              <td class="job-dt">
                                                                                    <li><a href="#" title="" style="background:grey;">desactivate</a></li>
                                                                                    <li><a href="#" title="">activate</a></li>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th scope="row">2</th>
                                                                              <td>Jacob</td>
                                                                              <td>Thornton</td>
                                                                              <td class="job-dt">
                                                                                    <li><a href="#" title="" style="background:grey;">desactivate</a></li>
                                                                                    <li><a href="#" title="">activate</a></li>
                                                                                    <li><a href="#" title="" style="background:#303281;">delegate</a></li>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th scope="row">3</th>
                                                                              <td>Larry</td>
                                                                              <td>the Bird</td>
                                                                              <td class="job-dt">
                                                                                    <li><a href="#" title="" style="background:grey;">desactivate</a></li>
                                                                                    <li><a href="#" title="">activate</a></li>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th scope="row">3</th>
                                                                              <td>Larry</td>
                                                                              <td>the Bird</td>
                                                                              <td class="job-dt">
                                                                                    <li><a href="#" title="" style="background:grey;">desactivate</a></li>
                                                                                    <li><a href="#" title="">activate</a></li>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th scope="row">3</th>
                                                                              <td>Larry</td>
                                                                              <td>the Bird</td>
                                                                              <td class="job-dt">
                                                                                    <li><a href="#" title="" style="background:grey;">desactivate</a></li>
                                                                                    <li><a href="#" title="">activate</a></li>
                                                                                    <li><a href="#" title="" style="background:#303281;">delegate</a></li>
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

                                    </div>
                              </div>
                        </div>
                  </div>
                  <!--account-tabs-setting end-->
            </div>
      </section>



      {{-- footer --}}
      @include('layouts.footer')
@endsection
