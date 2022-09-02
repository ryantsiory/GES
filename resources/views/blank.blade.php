<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.me/demo/bracketplus1.4/app/template/blank.html by HTTrack Website Copier/3.x [XR&CO2014], Thu, 02 Sep 2021 12:46:55 GMT -->
<head>
    <link rel="icon" href="{{ url('css/css/faviconGes.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style^m.css') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>GES</title>

    <!-- vendor css -->
    <link href="{{ asset('css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/app.css') }}" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('css/bracket.css') }}">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/css/app.css') }}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo" style="padding-left:75px"><a href="#"><span>[</span>Ge<i>S</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>



      @if(Auth::user()->role->name === 'personnel')
      <ul class="br-sideleft-menu">
        {{-- <li class="br-menu-item">
          <a href="/dashboard" class="br-menu-link   {{ (request()->is('dashboard*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">TABLEAU DE BORD</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item --> --}}

        <li class="br-menu-item">
            <a href="mytasks" class="br-menu-link with-sub    {{ (request()->is('mytasks*')) ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-briefcase-outline tx-20"></i>
              <span class="menu-item-label">MES TÂCHES</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('mytasks.index') }}"  class="sub-link">Liste tâches</a></li>
            </ul>
          </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub    {{ (request()->is('conges*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-redo-outline tx-20"></i>
            <span class="menu-item-label">CONGES</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('conges.create') }}" class="sub-link">Demander un congé</a></li>
            <li class="sub-item"><a href="{{ route('conges.index') }}" class="sub-link">Ma liste de congés</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="messages" class="br-menu-link    {{ (request()->is('mailbox*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">MESSAGES</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

      </ul><!-- br-sideleft-menu -->
      @endif



      @if(Auth::user()->role->name !== 'personnel')
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="/dashboard" class="br-menu-link   {{ (request()->is('dashboard*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">TABLEAU DE BORD</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub   {{ (request()->is('personnels*')) ? 'active' : '' }} ">
            <i class="menu-item-icon icon ion-ios-person-outline tx-20"></i>
            <span class="menu-item-label">PERSONNEL</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('personnels.create') }}" class="sub-link">Nouveau personnel</a></li>
            <li class="sub-item"><a href="{{ route('personnels.index') }}" class="sub-link">Liste personnel</a></li>
          </ul>
        </li>


        <li class="br-menu-item" >
          <a href="#" class="br-menu-link with-sub  {{ (request()->is('clients*')) ? 'active' : '' }}" >
            <i class="menu-item-icon icon ion-ios-people-outline tx-20"></i>
            <span class="menu-item-label">CLIENTS</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('clients.create') }}" class="sub-link">Nouveau client</a></li>
            <li class="sub-item"><a href="{{ route('clients.index') }}" class="sub-link">Liste client</a></li>
          </ul>
        </li>


        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub    {{ (request()->is('postes*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-20"></i>
            <span class="menu-item-label">POSTES</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('postes.create') }}" class="sub-link">Nouveau poste</a></li>
            <li class="sub-item"><a href="{{ route('postes.index') }}"  class="sub-link">Liste poste</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub    {{ (request()->is('projets*')) ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline-outline tx-20"></i>
              <span class="menu-item-label">PROJETS</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('projects.create') }}" class="sub-link">Nouveau projet</a></li>
              <li class="sub-item"><a href="{{ route('projects.index') }}"  class="sub-link">Liste projet</a></li>
            </ul>
          </li>

          <li class="br-menu-item">
            <a href="mytasks" class="br-menu-link with-sub    {{ (request()->is('mytasks*')) ? 'active' : '' }}">
              <i class="menu-item-icon icon ion-ios-briefcase-outline tx-20"></i>
              <span class="menu-item-label">MES TÂCHES</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('mytasks.index') }}"  class="sub-link">Liste tâches</a></li>
            </ul>
          </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub    {{ (request()->is('conges*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-redo-outline tx-20"></i>
            <span class="menu-item-label">CONGES</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('conges.create') }}" class="sub-link">Demander congé</a></li>
            <li class="sub-item"><a href="{{ route('conges.index') }}" class="sub-link">Liste congé</a></li>


            @if(Auth::user()->role->name === 'directeur')
            <li class="sub-item"><a href="{{ route('conges.validate') }}" class="sub-link">Valider congé</a></li>
            @endif
          </ul>
        </li>


        <li class="br-menu-item">
            <a href="messages" class="br-menu-link    {{ (request()->is('mailbox*')) ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">MESSAGES</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

      </ul><!-- br-sideleft-menu -->
      @endif



      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          <input id="searchbox" type="text" class="form-control d-none" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header dropdown-notif">
              <div class="dropdown-menu-label">
                <label>Messages</label>
                <a href="messages">Envoyer un nouveau Message</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                {{-- <a href="#" class="media-list-link">
                    <div class="media">
                      <img src="../img/img3.jpg" alt="">
                      <div class="media-body">
                        <div>
                          <p>Donna Seay</p>
                          <span>2 minutes ago</span>
                        </div><!-- d-flex -->
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                      </div>
                    </div><!-- media -->
                  </a> --}}

                  @if (!empty($users))
                    @foreach($users as $user)
                    <a href="{{ route('messages.index') }}" class="media-list-link">
                        <div class="media">
                            @if($user->unread)
                            <span class="pendingNav">{{ $user->unread }}</span>
                        @endif
                        <img src="{{ asset('images/'.$user->avatar) }}" alt=""  style="height: 45px;width: 45px; vertical-align: middle">
                        <div class="media-body">
                            <div>

                            <p>{{ $user->name }} @if (!empty($user->lastname)){{ $user->lastname }}@endif</p>

                            </div><!-- d-flex -->
                            @for ($i =0 ; $i <1 ; $i++)
                            @foreach ($messagesNav as $message)

                            @if ($message->from == $user->id)

                                    <p>{{ $message->message }}</p>



                                @endif
                            @endforeach
                            @endfor

                        </div>
                        </div><!-- media -->
                    </a>
                    @endforeach
                  @endif


                <div class="dropdown-footer">
                  <a href="messages"><i class="fa fa-angle-down"></i> Show All Messages</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->



          <div class="dropdown ">
            <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">

                <i class="icon ion-ios-bell-outline tx-24"></i>
                <!-- start: if statement -->
                @if (!empty($count_notifications))
                <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                <!-- end: if statement -->
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-header dropdown-notif">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="{{ route('notifications.allSeen') }}" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">Tout marquer comme lu</a>
              </div><!-- d-flex -->

            <form id="submit-form" action="{{ route('notifications.allSeen') }}" method="POST" class="hidden">
                @csrf

                @method('POST')
            </form>

              <div class="media-list">
                <!-- loop starts here -->
                @if (!empty($notifications))
                @foreach ($notifications as $notification)
                        @if ($notification->subject == "Congé")
                        <a href="{{ route('conges.show', $notification->object) }}" class="media-list-link @if ($notification->seen == 1) read @endif">
                        @endif
                        @if ($notification->subject == "Tâche")
                        <a href="{{ route('mytasks.index') }}" class="media-list-link @if ($notification->seen == 1) read @endif">
                        @endif
                    <div class="media">
                      <img src="../img/img8.jpg" alt="">
                      <div class="media-body">
                        <p class="noti-text"><strong>{{ $notification->subject }} - </strong>{{ $notification->text }}</p>
                        <span>{{ $notification->created_at }}</span>
                      </div>
                    </div><!-- media -->
                  </a>
                @endforeach
                @endif


                {{-- <!-- loop ends here -->
                <a href="#" class="media-list-link read">
                  <div class="media">
                    <img src="../img/img9.jpg" alt="">
                    <div class="media-body">
                      <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work <strong>The Social Network</strong></p>
                      <span>October 02, 2017 12:44am</span>
                    </div>
                  </div><!-- media -->
                </a> --}}

                <div class="dropdown-footer">
                  <a href="#"><i class="fa fa-angle-down"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->

            @if (Auth::user())
          <div class="dropdown">
            <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{auth::User()->name}} {{auth::User()->role->name}} {{auth::User()->id}}</span>
              <img src="{{ asset('images/'.auth::user()->avatar) }}" class="wd-32 rounded-circle" alt="" style="height:45px;">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">


                    <div class="tx-center">
                        <a href="#"><img src="{{ asset('images/'.auth::user()->avatar) }}" class="wd-80 rounded-circle" alt=""></a>
                        <h6 class="logged-fullname">{{auth::User()->name}} {{auth::User()->lastname}}</h6>
                        <p>{{auth::User()->email}}</p>
                    </div>

              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ url('edit-user/'.auth::User()->id) }}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href="#"><i class="icon ion-ios-gear"></i> Settings</a></li>
                <li><form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-block text-light">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
            @endif
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/">GES</a>
          <span class="breadcrumb-item active">@yield('page-title')</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="br-pagetitle">

        <div>
          <h4>@yield('page-title')</h4>
          <p class="mg-b-0">@yield('page-description')</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">

        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            Insertion réussi
          </div>
        @endif

          @yield('main-content')

      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('js/bracket.js') }}"></script>
  </body>

</html>
