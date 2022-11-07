
@extends('layouts.app',['title'=>'Accueil'])

@push('styles')
      <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('scripts')
      <script src="{{ asset('/src/axios.min.js') }}"></script>
      <script>
            const display_message = async (messages) => {
                  let messageRoot = document.querySelector('.messages-line');
                  let received_message_box = document.querySelector('#message-received');
                  console.log(messages.data.length);
                  for (let i = 0; i<=messages.data.length; i++){
                        const clone = received_message_box.content.cloneNode(true);
                        let mes_text = clone.querySelector(".message_text");
                        mes_text.textContent = "ce que que je veux";
                        let mes_date = clone.querySelector(".message_time");
                        mes_date.textContent = "une fois de plus bat les....";
                        let mes_photo = clone.querySelector(".member_photo");
                        mes_photo.src = "https://www.itu.int/hub/wp-content/uploads/sites/4/2021/12/icon_participation.svg"; 
                        messageRoot.appendChild(clone);
                  }
            }
      </script>
      <script>
            $(document).ready(function(){
                  let user = ""+{{ Session::get('user_name') }};
                  let memid = ""+{{ Session::get('user_id') }};

                  console.log("This is javascript session"+ user);
                   
                  axios.get('/loadMessage').then(function (response) {
                        display_message(response.data)
                  }) 
            });
            $('#send_message').click(function(e){
                  e.preventDefault();
                  let message = $('#input_message').val();
                  let token = $('meta[name="csrf-token"]').attr('content');
                  data = {'memberid':memid, 'mes': message, '_token': token};
                  axios.post('/sendMessage', data).then(function (response) {
                        display_message(response.data)
                  });
                  $('#input_message').val('');
            })
      </script>
@endpush

@section('content')

<section class="messages-page" style="padding: 30px 0;">
      <div class="container">
            <div class="messages-sec">
                  <div class="row">
                        <div class="col-lg-10 col-md-12 pd-right-none pd-left-none" style="margin: 0 auto;">
                              <div class="main-conversation-box" >
                                    <div class="message-bar-head" style="padding: 10px 20px;position: inherit;">
                                          <div class="usr-msg-details" style="top:6px;">
                                                <div class="usr-ms-img">
                                                      <img src="http://via.placeholder.com/50x50" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                      <h3> 
                                                            <i class="fa fa-comments-o" aria-hidden="true" style="font-size: 25px;margin-right:5px;"></i> 
                                                            <span>Espace de Chat</span>
                                                      </h3>
                                                </div><!--usr-mg-info end-->
                                          </div>
                                          <a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
                                    </div><!--message-bar-head end-->
                                   
                                    <div class="messages-line" style="overflow-y:scroll;position:inherit;padding-top:20px;height:550px">
                                          @foreach($messages as $mes)
                                                @if ($mes->membre->name == Session::get('membre_name') )
                                                      <div class="main-message-box ta-right">
                                                            <div class="message-dt">
                                                                  <span style="font-weight:bold;margin-bottom:3px;">{{Session::get('membre_name')}}</span>
                                                                  <div class="message-inner-dt">
                                                                        <p>{{$mes->message}}</p>
                                                                  </div>
                                                                  <span>{{$mes->created_at}}</span>
                                                            </div>
                                                            <div class="messg-usr-img">
                                                                  <img src="{{asset('images/01_Icon-Community@2x.png')}}" alt="">
                                                            </div>
                                                      </div>
                                                @else 
                                                      <div class="main-message-box st3">
                                                            <div class="message-dt st3">
                                                                  <span style="font-weight:bold;margin-bottom:3px;">{{$mes->membre->name}}</span>
                                                                  <div class="message-inner-dt">
                                                                        <p>{{$mes->message}}</p>
                                                                  </div>
                                                                  <span>{{$mes->created_at}}</span>
                                                            </div>
                                                            <div class="messg-usr-img">
                                                                  <img src="http://via.placeholder.com/50x50" alt="">
                                                            </div>
                                                      </div>
                                                @endif
                                          @endforeach
                                    </div>
                                    
                                    <div class="message-send-area">
                                          <form>
                                                <div class="mf-field">
                                                      <input id="input_message" type="text" name="message" placeholder="Type a message here">
                                                      <button id="send_message" type="submit">Send</button>
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <template id="message-received">
            <div class="main-message-box st3">
                  <div class="message-dt st3">
                        <div class="message-inner-dt">
                              <p class="message_text">Lorem ipsum dolor sit amet</p>
                        </div>
                        <span class="message_time">2 minutes ago</span>
                  </div>
                  <div class="messg-usr-img">
                        <img class="member_photo" src="http://via.placeholder.com/50x50" alt="">
                  </div>
            </div> 
      </template>
      
      <template id="message-send">
            <div class="main-message-box ta-right">
                  <div class="message-dt">
                        <span style="font-weight:bold;margin-bottom:3px;">Mr Khris</span>
                        <div class="message-inner-dt">
                              <p class="message_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                        </div>
                        <span class="message_time">Sat, Aug 23, 1:08 PM</span>
                  </div>
                  <div class="messg-usr-img">
                        <img src="{{asset('images/01_Icon-Community@2x.png')}}" alt="">
                  </div>
            </div>
      </template>

</section><!--messages-page end-->

@endsection

{{-- <div class="main-message-box st3">
      <div class="message-dt st3">
            <div class="message-inner-dt">
                  <p>....</p>
            </div><!--message-inner-dt end-->
            <span>Typing...</span>
      </div><!--message-dt end-->
      <div class="messg-usr-img">
            <img src="http://via.placeholder.com/50x50" alt="">
      </div><!--messg-usr-img end-->
</div><!--main-message-box end-->  --}}