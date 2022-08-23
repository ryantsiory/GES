@extends('layouts.app')

@section('right-content')

<div class="br-chatpanel">
    <div class="br-chatpanel-left">
        <nav class="nav">
            <a href="{{ url('/home') }}" data-toggle="tab" class="nav-link">Groups</a>
            <a href="/subscribe" class="nav-link">Join Group</a>
        </nav>


      <div class="br-active-contacts">
        <label class="br-sidebar-label">Active Contacts</label>
        <div class="br-chat-contacts">
          <div>
            <div class="br-img-user online"><img src="../img/img7.jpg" alt=""></div>
            <small>Raymart</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img3.jpg" alt=""></div>
            <small>Adrian</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img4.jpg" alt=""></div>
            <small>John</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img5.jpg" alt=""></div>
            <small>Daniel</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img6.jpg" alt=""></div>
            <small>Katherine</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img8.jpg" alt=""></div>
            <small>Junrisk</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img9.jpg" alt=""></div>
            <small>George</small>
          </div>
          <div>
            <div class="br-img-user online"><img src="../img/img10.jpg" alt=""></div>
            <small>Maryjane</small>
          </div>
          <div>
            <div class="chat-contacts-more">20+</div>
            <small>More</small>
          </div>
        </div><!-- br-active-contacts -->
      </div><!-- br-active-contacts -->

      <div class="br-chatlist">

        <ul class="users" style='text-align: center;'>
            @foreach($users as $user)
                <li class="user" id="{{ $user->id }}">

                   <div class="media-body">
                      <h3 class="name">{{ $user->name }}</h3>

                   </div>

                </li>
            @endforeach

        </ul>

      </div><!-- br-chatlist -->
    </div><!-- br-chatpanel-left -->
    <div class="br-chatpanel-body" id="messages">

      <div class="br-chat-footer">
        <nav class="nav">
          <a href="#" class="nav-link"><i class="icon ion-ios-camera-outline"></i></a>
          <a href="#" class="nav-link"><i class="icon ion-ios-mic-outline"></i></a>
        </nav>
        <div><input type="text" class="form-control" placeholder="Write your message here..."></div>
        <nav class="nav">
          <a href="#" class="nav-link"><i class="icon ion-happy-outline tx-22"></i></a>
          <a href="#" class="nav-link"><i class="icon ion-ios-game-controller-b-outline"></i></a>
          <a href="#" class="nav-link"><i class="icon ion-ios-gear-outline"></i></a>
        </nav>
      </div><!-- br-chat-footer -->
    </div><!-- br-chatpanel-body -->
  </div><!-- br-chatpanel -->

@endsection
