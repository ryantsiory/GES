<div class="br-chat-header">
    <img src={{ asset('/images/'.$userF->avatar) }} style="height:40px; width:40px; border-radius:50%" alt="Image" alt="">
    <div class="chat-name">
      <h6>{{ $userF->name }}</h6>
      <small>Last seen: 2 minutes ago</small>
    </div>
    <nav class="nav">
      <a href="#" class="nav-link"><i class="icon ion-android-more-vertical"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-telephone-outline"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-videocam-outline"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-trash-outline"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-information-outline"></i></a>
    </nav>
  </div><!-- br-msg-header -->

<div class="message-wrapper">

    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="br-chat-footer input-text">
    <nav class="nav">
      <a href="#" class="nav-link"><i class="icon ion-ios-camera-outline"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-mic-outline"></i></a>
    </nav>
    <div><input type="text" name="message" class=""></div>
    <nav class="nav">
      <a href="#" class="nav-link"><i class="icon ion-happy-outline tx-22"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-game-controller-b-outline"></i></a>
      <a href="#" class="nav-link"><i class="icon ion-ios-gear-outline"></i></a>
    </nav>
  </div><!-- br-chat-footer -->

