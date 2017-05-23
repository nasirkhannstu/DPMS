<div class="row">
    <div class="col-md-12">
        <div class="headmenu" style="width:100%">
            <div class="row">
                <div style="margin:20px">
                    <div class="col-md-2 col-sm-2">
                        <div class="logoimage" style="margin-left:20px">
                            <img src="{{url('images/Image-logo.png')}}" width="100px">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <h3>E-Medication Management System</h3>
                        <hr>
                        <h5>স্বাস্থ্য ই সকল সুখের মুল।</h5>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-default navbar-static-top" style="margin-top:20px">
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
            <a class="navbar-brand" href="{{ url('/') }}">
                
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(Sentinel::check())
                    <li>
                        @if(Sentinel::getUser()->roles()->first()->slug == 'doctor')
                        <a href="{{url('/doctor')}}">HOME</a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'patient')
                        <a href="{{url('/patient')}}">HOME</a>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'store')
                        <a href="{{url('/pharmacy')}}">HOME</a>
                        @endif
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Sentinel::getUser())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Sentinel::getUser()->first_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Sign Out
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{url('/login')}}">Login</a></li>
                    <li><a href="{{url('/register')}}">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
