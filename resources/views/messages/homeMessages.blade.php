@extends('layouts.app')
@extends('blank')

@section('main-content')






<div class="br-chatpanel">
    <div class="br-chatpanel-left">
      <nav class="nav">
        <a href="#" data-toggle="tab" class="nav-link active">Recent Chat</a>
        <a href="#" data-toggle="tab" class="nav-link">Groups</a>
        <a href="#" data-toggle="tab" class="nav-link">Calls</a>
      </nav>

      <div class="br-active-contacts">
        <label class="br-sidebar-label">Active Contacts</label>
        <div class="br-chat-contacts ps ps--active-x">
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
        <div class="ps__rail-x" style="width: 269px; left: 0px; top: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 169px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div><!-- br-active-contacts -->
      </div><!-- br-active-contacts -->

      <div class="br-chatlist ps ps--active-y">

        <div class="user-wrapper">
            @foreach($users as $user)
        <div class="media new user" id="{{ $user->id }}" >
          <div class="br-img-user online" >
            <img src="../img/img9.jpg" alt="">
            @if($user->unread)
            <span class="msg-count">{{ $user->unread }}</span>
            @endif
          </div>
          <div class="media-body">
            <div class="media-contact-name">
              <span>{{ $user->name }} @if (!empty($user->lastname)){{ $user->lastname }}@endif</span>
              <span>2 hours</span>
            </div>
            <p>Nam quam nunc, blandit vel aecenas et ante tincid</p>
          </div><!-- media-body -->
        </div><!-- media -->

        @endforeach
    </div>

        <div class="pd-y-10 pd-x-20">
          <a href="#" class="btn btn-secondary tx-12 btn-block pd-y-5">Load Older Messages</a>
        </div>
      <div class="ps__rail-x" style="left: 0px; top: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 495px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 272px;"></div></div></div><!-- br-chatlist -->
    </div><!-- br-chatpanel-left -->
    <div class="br-chatpanel-body">
        <div class="" id="messages">
        </div>



    </div><!-- br-chatpanel-body -->
  </div>











{{--
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                                       <li class="user" id="{{ $user->id }}">
                            {{--will show unread count nication
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif

                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ $user->avatar }}" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
reach
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">

            </div>
        </div>
    </div>--}}
@endsection
