<nav style="background: rgb(18,5,70);
background: linear-gradient(90deg, rgba(18,5,70,1) 0%, rgba(0,151,255,1) 0%, rgba(0,17,65,1) 100%);" class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-link">
                       <a  href="{{ url('/') }}">
                       <img src="../assets/img/logo.png"  width="100px" ></li>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Acceuil</a></li>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documents<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                  
                    <li><a class="nav-link" href="{{route('cours.index',['filieres'=>Auth::user()->filiere ?? ''])}}">Cours </a><li>
                        <li class="divider"></li>
                    <li><a class="nav-link" href="{{route('taf.index',['filieres'=>Auth::user()->filiere ?? ''])}}">Travail a faire </a><li>
                        <li class="divider"></li>
                    <li><a class="nav-link" href="{{route('td.index',['filieres'=>Auth::user()->filiere ?? ''])}}">TD </a><li>
                    

                     </ul>
                     </li>

                    <li class="nav-item"> <a class="nav-link" href="{{route('emploi.index',['filieres'=>Auth::user()->filiere ?? ''])}}" class="list-group-item">Emploi du temps </a></li>



                    <li class="nav-item" ><a  href="{{route('note.index',['filieres'=>Auth::user()->filiere ?? ''])}}">Notes</a></li>


                     
        
                    <li class="nav-item"><a  href="/evenements">Evenements</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                          <li class="dropdown" id="markasread" onclick="markNotificationAsRead(' {{count(auth()->user()->unreadNotifications)}}')">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-globe"></span><span class="badge">
                                    {{count(auth()->user()->unreadNotifications)}}</span>
                                </a>

                         <ul class="dropdown-menu" role="menu">
                            <li>
                            @forelse(auth()->user()->unreadNotifications as $notification)
                            @include('layouts.partials.notification.'.Str::snake(class_basename($notification->type)))
                            @empty
                            <a href="#">Pas de nouvelles notifications</a>
                            @endforelse
                            </li>
                        </ul>
                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{Auth::user()->name}}<span class="caret"></span> 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout <span class="glyphicon glyphicon-log-out"></span>
                                        </a>
                                         <a href="{{ route('user_profile',auth()->user()) }}">
                                            Mon Profil  <span class=" glyphicon glyphicon-user"></span>
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
