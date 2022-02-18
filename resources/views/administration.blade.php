@extends('layouts.app',['title'=>'Manage Site'])
@push('styles')
      <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
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

                                          <div class="tab-pane fade show" id="nav-entities" role="tabpanel" aria-labelledby="nav-acc-tab">
                                                <div class="acc-setting">
                                                      <h3>Add Member & Zones</h3>

                                                      <form>
                                                            <div class="cp-field">
                                                                  <h5>location</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="old-password" placeholder="Old Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="save-stngs pd2">
                                                                  <ul>
                                                                        <li><button type="submit">Save Setting</button></li>
                                                                  </ul>
                                                            </div>
                                                      </form>

                                                      <form>
                                                            <div class="cp-field">
                                                                  <h5>Member Name</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="new-password" placeholder="New Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Select the zone where the member stay</h5>
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

                                          <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                                <div class="acc-setting">
                                                      <h3>New Event</h3>
                                                      <form>
                                                            <div class="cp-field">
                                                                  <h5>event's title</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="old-password" placeholder="Old Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Member concerned</h5>
                                                                  <div class="cpp-fiel">
                                                                        <input type="text" name="old-password" placeholder="Old Password">
                                                                        <i class="fa fa-lock"></i>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Select the zone where the event take place</h5>
                                                                  <div class="cpp-fiel">
                                                                        <select id="inputState" class="form-control">
                                                                              <option selected>Choose...</option>
                                                                              <option>...</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Please enter a description</h5>
                                                                  <textarea></textarea>
                                                            </div>
                                                            <div class="cp-field">
                                                                  <h5>Please add some media file</h5>
                                                                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                            </div>
                                                            <div class="save-stngs pd2">
                                                                  <ul>
                                                                        <li><button type="submit">Save Setting</button></li>

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