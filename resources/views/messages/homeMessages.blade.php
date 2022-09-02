@extends('layouts.app')
@extends('blank')

@section('main-content')






<div class="br-chatpanel">
    <div class="br-chatpanel-left">
      <nav class="nav">
        <a href="#" data-toggle="tab" class="nav-link active">Recent Chat</a>

      </nav>

      <div class="br-active-contacts">

      </div><!-- br-active-contacts -->

      <div class="br-chatlist ps ps--active-y">

        <div class="user-wrapper">
            @foreach($users as $user)
        <div class="media new user" id="{{ $user->id }}" style="height: 58px;            overflow: hidden;        }">
            <img src={{ asset('/images/'.$user->avatar) }} style="height:40px; width:40px; border-radius:50%" alt="Image" >
            @if($user->unread)
            <span class="msg-count">{{ $user->unread }}</span>
            @endif

          <div class="media-body">
            <div class="media-contact-name">
              <span>{{ $user->name }} @if (!empty($user->lastname)){{ $user->lastname }}@endif</span>
              <span>2 hours</span>
            </div>
            @for ($i =0 ; $i <count($messagesNav) ; $i++)




            @if ($messagesNav[$i]->to == $user->id)

                <p> vous : {{ $messagesNav[$i]->message }}</p>
            @elseif  ($messagesNav[$i]->from == $user->id)

                <p>{{ $messagesNav[$i]->message }}</p>
            @endif
        @endfor
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
